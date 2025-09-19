@extends('layout.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800">Detail Arsip Surat</h1>
        <div class="pt-4 pb-4">
            <p class="text-gray-700 text-sm font-bold mb-1">Nomor: {{ $arsip->nomor_surat }}</p>
            <p class="text-gray-700 text-sm font-bold mb-1">Kategori: {{ $arsip->kategori->nama_kategori }}</p>
            <p class="text-gray-700 text-sm font-bold mb-1">Judul: {{ $arsip->judul_surat }}</p>
            <p class="text-gray-700 text-sm font-bold mb-1">Waktu Unggah: {{ $arsip->tanggal_upload }}</p>
        </div>
        <div class="mb-4">
            <iframe src="{{ $arsip->path_file }}" width="100%" height="600px" class="border rounded-lg"></iframe>
        </div>
            <a href="{{ route('arsip.index') }}" class="px-5 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 mr-2">
                Kembali
            </a>
            <a href="{{ route('arsip.download', $arsip->id_arsip) }}" class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 mr-2">
                Unduh
            </a>
            <a href="{{ route('arsip.editFile', $arsip->id_arsip) }}" 
                class="px-5 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">
                Edit file
            </a>
        

</div>
@endsection
