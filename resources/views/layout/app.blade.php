<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Dashboard</title>
  <style>
    [x-cloak] { display: none !important; }
  </style>

</head>
<body class="h-screen bg-gray-100">
  <div class="grid grid-cols-12 h-full">
    
    <!-- Sidebar -->
    <div class="col-span-3 bg-blue-600 text-white p-4">
      <h1 class="text-4xl font-bold mb-6 text-center">Menu</h1>
      @include('layout.sidebar')
    </div>

    <!-- Content -->
    <div class="col-span-9 p-6">
      
      @yield('content')
    </div>

  </div>
  <script src="//unpkg.com/alpinejs" defer></script>
  @stack('scripts')
</body>
</html>
