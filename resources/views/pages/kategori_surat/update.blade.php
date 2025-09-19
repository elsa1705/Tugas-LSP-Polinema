@extends('layout.app')

@section('content')
<div class="container mx-auto p-6">
  <h1 class="text-3xl font-bold mb-6 text-gray-800">Edit Kategori Surat</h1>
  <p class="mb-6 text-gray-600">Perbarui data kategori surat baru. Jika sudah selesai, jangan lupa klik tombol <span class="font-semibold">Perbarui Kategori</span>.</p>


  <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-4 flex items-center">
      <label for="id_kategori" class="w-40 text-gray-700 text-sm font-bold mb-2">ID Kategori</label>
      <input type="text" id="id_kategori" name="id_kategori" value="{{ $kategori->id_kategori }}" readonly
             class="mt-1 block w-full px-3 py-2 border border rounded-lg bg-gray-100 cursor-not-allowed focus:outline-none">
    </div>
    <div class="mb-4 flex items-start">
      <label for="nama_kategori" class="w-40 text-gray-700 text-sm font-bold mb-2">Nama Kategori</label>
      <input type="text" id="nama_kategori" name="nama_kategori" required
             class="mt-1 block w-full px-3 py-2 border border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none @error('nama_kategori') border-red-500 @enderror"
             value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
      @error('nama_kategori')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4 flex items-start">
      <label for="keterangan" class="w-40 text-gray-700 text-sm font-bold mb-2">Keterangan</label>
      <textarea id="keterangan" name="keterangan" rows="4"
                class="mt-1 block w-full px-3 py-2 border border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none @error('keterangan') border-red-500 @enderror">{{ old('keterangan', $kategori->keterangan) }}</textarea>
      @error('keterangan')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>
    <a href="{{ route('kategori.index') }}" class="px-5 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 mr-2">
      Kembali
    </a>
    <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
      Perbarui Kategori
    </button>
  </form>
</div>
@endsection
