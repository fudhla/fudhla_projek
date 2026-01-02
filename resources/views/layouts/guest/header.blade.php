<nav x-data="{ openFasilitas:false, openInfo:false, openAkun:false }"
    class="bg-blue-700 text-white px-8 py-3 shadow-xl flex justify-between items-center sticky top-0 z-50">

    {{-- LOGO --}}
    <a href="{{ route('fasilitas.index') }}" class="flex items-center space-x-3">
        <img src="{{ asset('assets/images/voc.png') }}" width="45" height="45" class="rounded-full">
        <h1 class="text-xl font-extrabold uppercase">Portal Desa</h1>
    </a>

    {{-- MENU --}}
    <div class="flex items-center space-x-2">

        {{-- BERANDA --}}
        <a href="{{ route('fasilitas.index') }}"
            class="px-4 py-2 rounded-lg hover:bg-white/10 transition font-medium">
            Beranda
        </a>

        {{-- FASILITAS --}}
        <div class="relative">
            <button @click="openFasilitas=!openFasilitas; openInfo=false; openAkun=false"
                class="px-4 py-2 rounded-lg hover:bg-white/10 flex items-center gap-1">
                Fasilitas
                <svg class="w-4 h-4 transition" :class="openFasilitas && 'rotate-180'"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5.5 7l4.5 4.5L14.5 7"/>
                </svg>
            </button>

            <div x-cloak x-show="openFasilitas" @click.outside="openFasilitas=false" x-transition
                class="absolute mt-2 w-56 bg-white text-gray-800 rounded-xl shadow-xl border z-50">

                <a href="{{ route('fasilitas.index') }}" class="block px-4 py-3 hover:bg-blue-50">Data Fasilitas</a>
                <a href="{{ route('pinjam.index') }}" class="block px-4 py-3 hover:bg-blue-50 border-t">Peminjaman</a>
                <a href="{{ route('syarat.index') }}" class="block px-4 py-3 hover:bg-blue-50 border-t">Syarat Fasilitas</a>
                <a href="{{ route('pembayaran.index') }}" class="block px-4 py-3 hover:bg-blue-50 border-t">Pembayaran</a>
                <a href="{{ route('petugas.index') }}" class="block px-4 py-3 hover:bg-blue-50 border-t">Petugas</a>
            </div>
        </div>

        {{-- WARGA --}}
        <a href="{{ route('warga.index') }}"
            class="px-4 py-2 rounded-lg hover:bg-white/10 transition font-medium">
            Warga
        </a>

        {{-- INFORMASI --}}
        <div class="relative">
            <button @click="openInfo=!openInfo; openFasilitas=false; openAkun=false"
                class="px-4 py-2 rounded-lg hover:bg-white/10 flex items-center gap-1">
                Informasi
                <svg class="w-4 h-4 transition" :class="openInfo && 'rotate-180'"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5.5 7l4.5 4.5L14.5 7"/>
                </svg>
            </button>

            <div x-cloak x-show="openInfo" @click.outside="openInfo=false" x-transition
                class="absolute mt-2 w-52 bg-white text-gray-800 rounded-xl shadow-xl border z-50">
                <a href="{{ route('about') }}" class="block px-4 py-3 hover:bg-blue-50">Tentang</a>
                <a href="{{ route('kontak') }}" class="block px-4 py-3 hover:bg-blue-50 border-t">Kontak</a>
            </div>
        </div>

        {{-- AKUN --}}
        <div class="relative">
            <button @click="openAkun=!openAkun; openFasilitas=false; openInfo=false"
                class="px-4 py-1.5 rounded-full bg-blue-800 flex items-center gap-2 border">
                <span class="font-bold text-sm">AKUN</span>
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5.5 7l4.5 4.5L14.5 7"/>
                </svg>
            </button>

            <div x-cloak x-show="openAkun" @click.outside="openAkun=false" x-transition
                class="absolute right-0 mt-2 w-56 bg-white text-gray-800 rounded-xl shadow-xl border z-50">

                <a href="{{ route('user.index') }}" class="block px-4 py-3 hover:bg-blue-50">
                    Data User
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="w-full text-left px-4 py-3 text-red-600 hover:bg-red-50 border-t">
                        Logout
                    </button>
                </form>
            </div>
        </div>

    </div>
</nav>
