<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $query = Kategori::query();

        if ($request->filled('search')) {
            $query->where('nama_kategori', 'like', '%' . $request->search . '%');
        }

        $kategoris = $query->paginate(5)->appends(['search' => $request->search]);

        return view('pages.kategori_surat.index', compact('kategoris'));
    }


    public function create()
    {
        return view('pages.kategori_surat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'regex:/^[A-Za-z\s]+$/',
                'unique:kategoris_surat,nama_kategori,' . ($kategori->id_kategori ?? 'NULL') . ',id_kategori'
            ],
            'keterangan' => 'nullable|string',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return view('pages.kategori_surat.update', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'regex:/^[A-Za-z\s]+$/', 
                'unique:kategoris_surat,nama_kategori,' . ($kategori->id_kategori ?? 'NULL') . ',id_kategori'
            ],
            'keterangan' => 'nullable|string',
        ]);


        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
