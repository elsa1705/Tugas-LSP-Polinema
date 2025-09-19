@extends('layout.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit File Surat</h1>

    <div class="bg-white p-6 rounded-lg shadow">
        <form action="{{ route('arsip.updateFile', $arsip->id_arsip) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6 flex items-center">
                <label for="file_surat" class="w-40 text-gray-700 text-sm font-bold mb-2">File Baru (PDF):</label>

                <!-- wrapper input text + tombol -->
                <div class="flex w-full">
                    <!-- Input text untuk menampilkan nama file -->
                    <input type="text" id="file_name_display" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" 
                           placeholder="{{ $arsip->file_surat ?? 'Belum ada file dipilih' }}" readonly>
                           

                    <!-- Tombol custom -->
                    <button type="button" id="btnChooseFile" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 whitespace-nowrap">
                        Browse File 
                    </button>
                </div>

                <!-- Input file asli (disembunyikan) -->
                <input type="file" name="file_surat" id="file_surat" accept="application/pdf" class="hidden">

                @error('file_surat')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <a href="{{ route('arsip.show', $arsip->id_arsip) }}" class="px-5 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 mr-2">Kembali</a>
            <button type="submit" class="px-5 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">Update File</button>
        </form>
    </div>
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
            fileNameDisplay.value = "{{ $arsip->file_surat ?? 'Belum ada file dipilih' }}";
        }
    });
</script>
@endsection

