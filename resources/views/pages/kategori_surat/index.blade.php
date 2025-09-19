@extends('layout.app')

@section('content')
<div x-data="{ openModal: false, deleteUrl: '' }" class="container mx-auto p-6">
  <h1 class="text-3xl font-bold mb-6 text-gray-800">Kategori Surat</h1>

  <p class="mb-2 text-gray-600">Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.</p>
  <p class="mb-2 text-gray-600">Klik <span class="font-semibold">Tambah</span> di bawah tabel untuk menambahkan kategori baru.</p>
  <p class="mb-2 text-gray-600">Klik <span class="font-semibold">Edit</span> untuk mengedit data kategori.</p>
  <p class="mb-6 text-gray-600">Klik <span class="font-semibold">Hapus</span> untuk menghapus data kategori.</p>
  <!-- Success Message -->
  @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
          <strong class="font-bold">Success!</strong>
          <span class="block sm:inline">{{ session('success') }}</span>
        </div>
  @endif
  <!-- Form Search -->
    <div class="mb-4">
        <form action="{{ route('kategori.index') }}" method="GET" class="flex gap-2">
          <p class="text-gray-700 self-center">Cari Kategori:</p>
            <input type="text" name="search" placeholder="Cari kategori..."
                   value="{{ request('search') }}"
                   class="w-1/3 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Cari
            </button>
        </form>
    </div>
  <!-- Table -->
  <div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full text-sm text-left border border-gray-200">
      <thead class="bg-gray-100 text-gray-700">
        <tr>
          <th class="px-4 py-2 border">ID Kategori</th>
          <th class="px-4 py-2 border">Nama Kategori</th>
          <th class="px-4 py-2 border">Keterangan</th>
          <th class="px-4 py-2 border text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y">
        @forelse ($kategoris as $kategori)
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-2 border">{{ $kategori->id_kategori }}</td>
          <td class="px-4 py-2 border">{{ $kategori->nama_kategori }}</td>
          <td class="px-4 py-2 border">{{ $kategori->keterangan }}</td>
          <td class="px-4 py-2 border text-center">
            <div class="flex justify-center gap-2">
              <a href="{{ route('kategori.edit', $kategori->id_kategori) }}" class="px-3 py-1 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700">Edit</a>

              <!-- Trigger Modal -->
              <button 
                type="button" 
                @click="openModal = true; deleteUrl = '{{ route('kategori.destroy', $kategori->id_kategori) }}'" 
                class="px-3 py-1 text-sm bg-red-600 text-white rounded-lg hover:bg-red-700">
                Hapus
              </button>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4" class="px-4 py-2 text-center text-gray-500">Tidak ada data kategori.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="p-4 text-sm text-gray-700">
      {{ $kategoris->links() }}
  </div>

  <div class="mt-6">
    <a href="{{ route('kategori.create') }}" class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
      (+) Tambah Kategori Baru
    </a> 
  </div>

  <!-- Modal Konfirmasi Hapus -->
  <div 
      x-show="openModal" 
      x-cloak
      @click.away="openModal = false"
      class="fixed inset-0 flex items-center justify-center bg-opacity-10 z-50"
      x-transition
  >
      <div class="bg-white rounded-lg shadow-lg w-96 p-6 text-center">
          <h2 class="text-xl font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h2>
          <p class="text-gray-600 mb-6">Apakah kamu yakin ingin menghapus kategori ini?</p>

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

@push('scripts')
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.querySelector(".min-w-full");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1]; // Assuming 'Nama Kategori' is the second column (index 1)
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
@endpush
