@extends('layout.app')

@section('content')
<div x-data="{ openModal: false, deleteUrl: '' }" class="container mx-auto p-6">
  <h1 class="text-3xl font-bold mb-6 text-gray-800">Arsip Surat</h1>

  <p class="mb-2 text-gray-600">Berikut ini adalah surat-surat yang telah diarsipkan.</p>
  <p class="mb-2 text-gray-600">Klik <span class="font-semibold">Arsipkan Surat</span> di bawah tabel untuk menambahkan surat baru.</p>
  <p class="mb-2 text-gray-600">Klik <span class="font-semibold">Edit</span> untuk mengedit data surat.</p>
  <p class="mb-6 text-gray-600">Klik <span class="font-semibold">Hapus</span> untuk menghapus data surat.</p>
  
  @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
          <strong class="font-bold">Success!</strong>
          <span class="block sm:inline">{{ session('success') }}</span>
        </div>
  @endif

  <div class="mb-4">
        <form action="{{ route('arsip.index') }}" method="GET" class="flex gap-2">
            <p class="text-gray-700 self-center">Cari Surat:</p>
            <input type="text" name="search" placeholder="Cari surat..."
                   value="{{ request('search') }}"
                   class="w-1/3 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Cari</button>
        </form>
  </div>

  <div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full text-sm text-left border border-gray-200">
      <thead class="bg-gray-100 text-gray-700">
        <tr>
          <th class="px-4 py-2 border">Nomor Surat</th>
          <th class="px-4 py-2 border">Kategori</th>
          <th class="px-4 py-2 border">Judul</th>
          <th class="px-4 py-2 border">Waktu Pengarsipan</th>
          <th class="px-4 py-2 border text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y">
        @forelse ($arsips as $arsip)
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-2 border">{{ $arsip->nomor_surat }}</td>
          <td class="px-4 py-2 border">{{ $arsip->kategori->nama_kategori }}</td>
          <td class="px-4 py-2 border">{{ $arsip->judul_surat }}</td>
          <td class="px-4 py-2 border">{{ $arsip->tanggal_upload }}</td>
          <td class="px-4 py-2 border text-center">
            
            <div class="flex justify-center gap-2">
              <button 
                type="button" 
                @click="openModal = true; deleteUrl = '{{ route('arsip.destroy', $arsip->id_arsip) }}'" 
                class="px-3 py-1 text-sm bg-red-600 text-white rounded-lg hover:bg-red-700">
                Hapus
              </button>
              
              <a href="{{ route('arsip.download', $arsip->id_arsip) }}" class="px-3 py-1 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700">Unduh</a>
              
              <a href="{{ route('arsip.show', $arsip->id_arsip) }}" class="px-3 py-1 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-700">Lihat</a>
            </div>
            </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="px-4 py-2 text-center text-gray-500">Tidak ada data arsip surat.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="p-4 text-sm text-gray-700">
        {{ $arsips->links() }}
  </div>

  <div class="mt-6">
    <a href="{{ route('arsip.create') }}" class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
      (+) Arsipkan Surat
    </a> 
  </div>

  <div 
      x-show="openModal" 
      x-cloak
      @click.away="openModal = false"
      class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
      x-transition
  >
      <div class="bg-white rounded-lg shadow-lg w-96 p-6 text-center">
          <h2 class="text-xl font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h2>
          <p class="text-gray-600 mb-6">Apakah kamu yakin ingin menghapus arsip surat ini?</p>

          <div class="flex justify-center gap-3">
              <button 
                  @click="openModal = false" 
                  class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                  Batal
              </button>

              <form :action="deleteUrl" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                      Hapus
                  </button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection