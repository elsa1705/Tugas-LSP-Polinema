<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $arsips = Arsip::with('kategori')->paginate(5);
        if ($request->has('search')) {
            $arsips = Arsip::with('kategori')
                ->where('judul_surat', 'like', '%' . $request->search . '%')
                ->paginate(5);
        }
        return view('pages.arsip_surat.index', compact('arsips'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('pages.arsip_surat.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|unique:arsip_surat,nomor_surat',
            'judul_surat' => 'required|string',
            'kategori_id' => 'required|exists:kategoris_surat,id_kategori',
            'file_surat' => 'required|file|mimes:pdf|max:2048', // Max 2MB
        ]);

        $file = $request->file('file_surat');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('surat', $fileName, 'public');
        if (!$filePath) {
        Log::error('❌ Gagal menyimpan file surat: ' . $fileName);
        return back()->with('error', 'Gagal menyimpan file surat. Silakan coba lagi.');
        } else {
            Log::info('✅ File surat berhasil disimpan: ' . $filePath);
        }
        Arsip::create([
            'nomor_surat' => $request->nomor_surat,
            'judul_surat' => $request->judul_surat,
            'kategori_id' => $request->kategori_id,
            'tanggal_upload' => now(),
            'file_surat' => $fileName,
            'path_file' => Storage::url($filePath),
        ]);

        return redirect()->route('arsip.index')->with('success', 'Arsip surat berhasil ditambahkan.');
    }

    public function show(Arsip $arsip)
    {
        return view('pages.arsip_surat.view', compact('arsip'));
    }


    // public function edit(Arsip $arsip)
    // {
    //     $kategoris = Kategori::all();
    //     return view('pages.arsip_surat.update', compact('arsip', 'kategoris'));
    // }

    // public function update(Request $request, Arsip $arsip)
    // {
    //     $request->validate([
    //         'nomor_surat' => 'required|string|unique:arsip_surat,nomor_surat,' . $arsip->id_arsip . ',id_arsip',
    //         'judul_surat' => 'required|string',
    //         'kategori_id' => 'required|exists:kategoris,id_kategori',
    //         'file_surat' => 'nullable|file|mimes:pdf|max:2048',
    //     ]);

    //     $data = $request->only(['nomor_surat', 'judul_surat', 'kategori_id']);

    //     if ($request->hasFile('file_surat')) {
    //         // Delete old file
    //         Storage::delete(str_replace('/storage', 'public', $arsip->path_file));

    //         $file = $request->file('file_surat');
    //         $fileName = time() . '_' . $file->getClientOriginalName();
    //         $filePath = $file->storeAs('public/surat', $fileName);
    //         $data['file_surat'] = $fileName;
    //         $data['path_file'] = Storage::url($filePath);
    //     }

    //     $arsip->update($data);

    //     return redirect()->route('arsip.index')->with('success', 'Arsip surat berhasil diperbarui.');
    // }

    public function destroy(Arsip $arsip)
    {
        Storage::delete(str_replace('/storage', 'public', $arsip->path_file));
        $arsip->delete();

        return redirect()->route('arsip.index')->with('success', 'Arsip surat berhasil dihapus.');
    }
    public function download(Arsip $arsip)
    {
        $filePath = 'surat/' . $arsip->file_surat;

        if (!Storage::disk('public')->exists('surat/' . $arsip->file_surat)) {
            return back()->with('error', 'File tidak ditemukan.');
        }
        $fullPath = storage_path('app/public/' . $filePath);
        return response()->download($fullPath, $arsip->file_surat);
    }

    public function editFile(Arsip $arsip)
    {
        return view('pages.arsip_surat.edit_file', compact('arsip'));
    }

    public function updateFile(Request $request, Arsip $arsip)
    {
        $request->validate([
            'file_surat' => 'required|file|mimes:pdf|max:2048',
        ]);

        // hapus file lama
        Storage::delete(str_replace('/storage', 'public', $arsip->path_file));

        // simpan file baru
        $file = $request->file('file_surat');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('surat', $fileName, 'public');

        // update hanya kolom file
        $arsip->update([
            'file_surat' => $fileName,
            'path_file' => Storage::url($filePath),
        ]);

        return redirect()->route('arsip.show', $arsip->id_arsip)->with('success', 'File surat berhasil diperbarui.');
    }

}
