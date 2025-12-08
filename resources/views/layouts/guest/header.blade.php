<nav class="bg-blue-700 text-white px-6 py-4 shadow-lg flex justify-between items-center sticky top-0 z-50">

    <div class="flex items-center space-x-3">
        <a href="{{ route('fasilitas.index') }}" class="brand-logo">
            <img src="{{ asset('assets/images/voc.png') }}" height="50" width="50" class="rounded-full" alt="logo">
        </a>
        <h1 class="text-2xl font-bold">Portal Fasilitas Desa</h1>
    </div>

    <div class="flex items-center space-x-6">
        {{-- 1. Beranda --}}
        <a href="{{ route('fasilitas.index') }}"
            class="nav-link flex items-center hover:text-blue-200 transition duration-200">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"></path>
            </svg>
            Beranda
        </a>

        {{-- 2. Fasilitas --}}
        <a href="{{ route('fasilitas.index') }}" class="nav-link flex items-center hover:text-blue-200 transition duration-200">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 20h6"></path>
            </svg>
            Fasilitas
        </a>

        {{-- 5. Peminjaman --}}
        <a href="{{ route('pinjam.index') }}"
            class="nav-link flex items-center hover:text-blue-200 transition duration-200">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7a2 2 0 002 2z"></path>
            </svg>
            Peminjaman
        </a>

        {{-- 3. User --}}
        <a href="{{ route('user.index') }}" class="nav-link flex items-center hover:text-blue-200 transition duration-200">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm-6-2.646l3-3.001 3 3.001v-1a6 6 0 00-6 0v1z"></path>
            </svg>
            User
        </a>

        {{-- 4. Warga --}}
        <a href="{{ route('warga.index') }}" class="nav-link flex items-center hover:text-blue-200 transition duration-200">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20h-2m2 0h2M11 15v1m0 0h1m-1 0h-1m2-1v1m0 0h1m-1 0h-1m-2-1v1m0 0h1m-1 0h-1m2-1v1m0 0h1m-1 0h-1M9 15v1m0 0h1m-1 0h-1m2-1v1m0 0h1m-1 0h-1M5 15v1m0 0h1m-1 0h-1m2-1v1m0 0h1m-1 0h-1M12 12a4 4 0 100-8 4 4 0 000 8zM5 12h2a2 2 0 012 2v2H5v-2a2 2 0 012-2z">
                </path>
            </svg>
            Warga
        </a>

        {{-- 6. Tentang Aplikasi --}}
        <a href="{{ route('about') }}" class="nav-link flex items-center hover:text-blue-200 transition duration-200">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                </path>
            </svg>
            Tentang Aplikasi
        </a>

        {{-- 7. Kontak --}}
        <a href="#kontak" class="nav-link flex items-center hover:text-blue-200 transition duration-200">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            Kontak
        </a>
    </div>

</nav>
