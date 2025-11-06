 <!-- NAVBAR -->
 <nav class="bg-blue-700 text-white px-6 py-4 shadow-lg flex justify-between items-center">
     <h1 class="text-2xl font-bold">Portal Fasilitas Desa</h1>
     <div class="space-x-6">
         <a href="#" class="nav-link hover:underline">Beranda</a>
         <a href="{{ route('fasilitas.index') }} #fasilitas" class="nav-link hover:underline">Fasilitas</a>
         <a href="{{ route('user.index') }}" class="nav-link hover:underline">User</a>
         <a href="{{ route('warga.index') }}"class="nav-link hover:underline">Warga</a>
         <a href="#kontak" class="nav-link hover:underline">Kontak</a>
     </div>
 </nav>
