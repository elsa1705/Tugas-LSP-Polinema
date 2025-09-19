@extends('layout.app')

@section('content')
<div class="container mx-auto p-6">
  <h1 class="text-3xl font-bold mb-6 text-gray-800 text-left">About</h1>

  <div class="bg-white rounded-xl shadow-lg p-6 md:p-10 flex flex-col md:flex-row items-center gap-8">
    <div class="flex-shrink-0 w-40 h-50 overflow-hidden shadow-md border-2 border-blue-500">
      <img src="{{ asset('images/profile.jpg') }}" alt="Foto Profil" class="w-full h-full object-cover">
    </div>

    <div class="text-gray-700 text-lg">
      <p class="font-semibold mb-3">Aplikasi ini dibuat oleh:</p>
      <div class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-2">
        {{-- Baris 1 --}}
        <span class="font-semibold">Nama</span>
        <span>: Elsa Firdayanti Hidayah</span>
        
        {{-- Baris 2 --}}
        <span class="font-semibold">Prodi</span>
        <span>: D3-MI PSDKU Kediri</span>
        
        {{-- Baris 3 --}}
        <span class="font-semibold">NIM</span>
        <span>: 2331730017</span>
        
        {{-- Baris 4 --}}
        <span class="font-semibold">Tanggal</span>
        <span>: 18 September 2025</span>
      </div>
    </div>
  </div>
</div>
@endsection