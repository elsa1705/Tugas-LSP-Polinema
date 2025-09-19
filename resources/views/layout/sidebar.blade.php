<nav class="space-y-2">
  <a href="{{ route('arsip.index') }}" class="flex items-center p-2 rounded hover:bg-gray-700">
    <img src="{{ asset('images/arsip.png') }}" alt="Ikon Arsip" class="w-6 h-6 mr-3">
    Arsip Surat
  </a>

  <a href="{{ route('kategori.index') }}" class="flex items-center p-2 rounded hover:bg-gray-700">
    <img src="{{ asset('images/kategori.png') }}" alt="Ikon Kategori" class="w-6 h-6 mr-3">
    Kategori Surat
  </a>

  <a href="{{ route('about') }}" class="flex items-center p-2 rounded hover:bg-gray-700">
    <img src="{{ asset('images/about.png') }}" alt="Ikon About" class="w-6 h-6 mr-3">
    About
  </a>
</nav>