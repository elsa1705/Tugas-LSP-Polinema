@extends('layout.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Arsipkan Surat</h1>
        <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4 flex items-center">
                <label for="nomor_surat" class="w-40 text-gray-700 text-sm font-bold mb-2">Nomor Surat:</label>
                <input type="text" name="nomor_surat" id="nomor_surat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nomor_surat') border-red-500 @enderror" value="{{ old('nomor_surat') }}" required>
                @error('nomor_surat')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 flex items-center">
                <label for="kategori_id" class="w-40 text-gray-700 text-sm font-bold mb-2">Kategori:</label>
                <select name="kategori_id" id="kategori_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('kategori_id') border-red-500 @enderror" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id_kategori }}" {{ old('kategori_id') == $kategori->id_kategori ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 flex items-center">
                <label for="judul_surat" class="w-40 text-gray-700 text-sm font-bold mb-2">Judul:</label>
                <input type="text" name="judul_surat" id="judul_surat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('judul_surat') border-red-500 @enderror" value="{{ old('judul_surat') }}" required>
                @error('judul_surat')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6 flex items-center">
              <label for="file_surat" class="w-40 text-gray-700 text-sm font-bold mb-2">File Surat (PDF):</label>
               <div class="flex w-full">
                <!-- Input text untuk menampilkan nama file -->
                  <input type="text" id="file_name_display" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" 
                        placeholder="Belum ada file dipilih" readonly>

                  <!-- Tombol custom -->
                  <button type="button" id="btnChooseFile" 
                          class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 whitespace-nowrap">
                      Browse File
                  </button>
              </div>
              <!-- Input file asli (disembunyikan) -->
              <input type="file" name="file_surat" id="file_surat" accept="application/pdf" class="hidden" required>
              
              @error('file_surat')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
            <a href="{{ route('arsip.index') }}" class="px-5 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 mr-2">
                    Kembali
            </a>
            <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                    Simpan
            </button>
        </form>
</div>

<script>
    // ambil elemen
    const fileInput = document.getElementById('file_surat');
    const btnChoose = document.getElementById('btnChooseFile');
    const fileNameDisplay = document.getElementById('file_name_display');

    // tombol "Ambil Berkas" membuka file input
    btnChoose.addEventListener('click', () => {
        fileInput.click();
    });

    // saat file dipilih, tampilkan nama file
    fileInput.addEventListener('change', () => {
        if (fileInput.files.length > 0) {
            fileNameDisplay.value = fileInput.files[0].name;
        } else {
            fileNameDisplay.value = "Belum ada file dipilih";
        }
    });
</script>

@endsection
