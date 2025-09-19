@extends('layout.app')

@section('content')
<div class="container mx-auto p-6">
  <h1 class="text-3xl font-bold mb-6 text-gray-800">Tambah Kategori Surat</h1>
  <p class="mb-6 text-gray-600">Tambahkan data kategori surat baru. Jika sudah selesai, jangan lupa klik tombol <span class="font-semibold">Simpan Kategori</span>.</p>

  <form action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <div class="mb-4 flex items-center">
      <label for="nama_kategori" class="w-40 text-gray-700 text-sm font-bold mb-2">Nama Kategori</label>
      <input type="text" id="nama_kategori" name="nama_kategori" required
            class="flex-1 px-3 py-2 border border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none @error('nama_kategori') border-red-500 @enderror"
            value="{{ old('nama_kategori') }}">
      @error('nama_kategori')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4 flex items-start">
      <label for="keterangan" class="w-40 text-gray-700 text-sm font-bold mb-2">Keterangan</label>
      <textarea id="keterangan" name="keterangan" rows="4"
                class="flex-1 px-3 py-2 border border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none @error('keterangan') border-red-500 @enderror">{{ old('keterangan') }}</textarea>
      @error('keterangan')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    <a href="{{ route('kategori.index') }}" class="px-5 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 mr-2">
      Kembali
    </a>
    <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
      Simpan Kategori
    </button>
  </form>
</div>
@endsection
