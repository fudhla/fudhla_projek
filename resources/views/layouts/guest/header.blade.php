<nav class="bg-blue-700 text-white px-8 py-3 shadow-xl flex justify-between items-center sticky top-0 z-50">

    {{-- LOGO AREA --}}
    <div class="flex items-center space-x-4">
        <a href="{{ route('fasilitas.index') }}" class="flex items-center space-x-3 group">
            {{-- Logo tetap dengan path yang sama, tapi ditambahkan container putih agar lebih jelas --}}
            <div>
                <img src="{{ asset('assets/images/voc.png') }}" height="45" width="45"
                    class="rounded-full object-cover" alt="logo">
            </div>
            <h1 class="text-xl font-extrabold tracking-tight uppercase">Portal Desa</h1>
        </a>
    </div>

    {{-- MENU AREA --}}
    <div class="flex items-center space-x-2">

        {{-- 1. Beranda (Link Tunggal) --}}
        <a href="{{ route('fasilitas.index') }}"
            class="flex items-center px-4 py-2 rounded-lg hover:bg-white/10 transition duration-200 font-medium">
            <svg class="w-5 h-5 mr-2 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2 7-7 7 7M5 10v10h14V10" />
            </svg>
            Beranda
        </a>

        {{-- 2. Dropdown Fasilitas (Fasilitas + Peminjaman) --}}
        <div class="relative group">
            <button
                class="flex items-center px-4 py-2 rounded-lg hover:bg-white/10 transition duration-200 font-medium">
                <svg class="w-5 h-5 mr-2 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16" />
                </svg>
                Fasilitas
                <svg class="w-4 h-4 ml-1.5 opacity-60 group-hover:rotate-180 transition-transform" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path d="M5.5 7l4.5 4.5L14.5 7" />
                </svg>
            </button>
            <div
                class="absolute hidden group-hover:block bg-white text-gray-800 rounded-xl shadow-2xl mt-1 w-48 overflow-hidden border border-gray-100 z-50">
                <a href="{{ route('fasilitas.index') }}" class="block px-4 py-3 hover:bg-blue-50 transition">Data
                    Fasilitas</a>
                <a href="{{ route('pinjam.index') }}"
                    class="block px-4 py-3 hover:bg-blue-50 transition border-t border-gray-50">Peminjaman</a>
            </div>
        </div>

        {{-- 3. Warga (Link Tunggal) --}}
        <a href="{{ route('warga.index') }}"
            class="flex items-center px-4 py-2 rounded-lg hover:bg-white/10 transition duration-200 font-medium">
            <svg class="w-5 h-5 mr-2 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20h-2m2 0h2M9 12a4 4 0 100-8 4 4 0 000 8z" />
            </svg>
            Warga
        </a>

        {{-- 4. Dropdown Informasi (Tentang + Kontak) --}}
        <div class="relative group">
            <button
                class="flex items-center px-4 py-2 rounded-lg hover:bg-white/10 transition duration-200 font-medium">
                <svg class="w-5 h-5 mr-2 text-blue-200" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Informasi
                <svg class="w-4 h-4 ml-1.5 opacity-60 group-hover:rotate-180 transition-transform" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path d="M5.5 7l4.5 4.5L14.5 7" />
                </svg>
            </button>
            <div
                class="absolute hidden group-hover:block bg-white text-gray-800 rounded-xl shadow-2xl mt-1 w-52 overflow-hidden border border-gray-100 z-50">
                <a href="{{ route('about') }}" class="block px-4 py-3 hover:bg-blue-50 transition">Tentang Aplikasi</a>
                <a href="{{ route('kontak') }}"
                    class="block px-4 py-3 hover:bg-blue-50 transition border-t border-gray-50">Kontak Kami</a>
            </div>
        </div>

        {{-- Separator --}}
        <div class="h-8 w-px bg-white/20 mx-2"></div>

        {{-- 5. Dropdown Akun (User + Logout) --}}
        <div class="relative group">
            <button
                class="flex items-center space-x-2 pl-2 pr-4 py-1.5 rounded-full bg-blue-800 hover:bg-blue-600 transition border border-blue-400/30 shadow-inner">
                <div class="bg-blue-500 p-1.5 rounded-full">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <span class="font-bold text-sm tracking-wide">AKUN</span>
                <svg class="w-4 h-4 opacity-60" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5.5 7l4.5 4.5L14.5 7" />
                </svg>
            </button>

            <div
                class="absolute right-0 hidden group-hover:block bg-white text-gray-800 rounded-xl shadow-2xl mt-2 w-56 overflow-hidden border border-gray-100 z-50">
                <div class="px-4 py-3 bg-gray-50 border-b border-gray-100">
                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">Administrator</p>
                </div>

                <a href="{{ route('user.index') }}"
                    class="flex items-center px-4 py-3 hover:bg-blue-50 transition group/item">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover/item:text-blue-600 transition" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1z" />
                    </svg>
                    Data User
                </a>
                <form action="{{ route('logout') }}" method="GET">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center px-4 py-3 text-red-600 hover:bg-red-50 transition font-bold border-t border-gray-50">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>

    </div>
</nav>
