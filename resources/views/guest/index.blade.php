@extends('layouts.guest.app')
@section('content')

    {{-- ===================================== --}}
    {{-- TOMBOL LOGOUT (POJOK KANAN ATAS) --}}
    {{-- ===================================== --}}
    <div class="container mx-auto px-6 mt-6 flex justify-end">
        <form action="{{ route('logout') }}" method="GET">
            @csrf
            <button type="submit"
                class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow transition duration-200 flex items-center gap-2">
                <i class="bi bi-box-arrow-right text-lg"></i> Logout
            </button>
        </form>
    </div>

    <!-- HERO SECTION -->
    <section class="hero relative h-[500px] flex items-center justify-center text-center text-white"
     style="background-image: url('{{ asset('assets/images/bg.jpg') }}'); background-size: cover; background-position: center;">
        <div class="hero-overlay absolute inset-0"></div>
        <div class="relative z-10 max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Selamat Datang Di Portal Fasilitas Umum Desa
            </h1>
            <p class="text-lg md:text-xl text-blue-100">
                Temukan berbagai fasilitas umum yang tersedia di desa Anda. Informasi lengkap dan terbaru hanya di sini.
            </p>
        </div>
    </section>

    <!-- STATISTIK -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-10">Statistik Fasilitas</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $total = isset($fasilitas) ? $fasilitas->count() : 0;
                    $lapangan = isset($fasilitas) ? $fasilitas->filter(fn($f) => $f->jenis == 'Lapangan')->count() : 0;
                    $aula = isset($fasilitas) ? $fasilitas->filter(fn($f) => $f->jenis == 'Aula')->count() : 0;
                @endphp

                <div class="bg-white p-6 rounded-2xl shadow-lg">
                    <h3 class="text-2xl font-semibold text-blue-600">{{ $total }}</h3>
                    <p class="text-gray-600 mt-2">Total Fasilitas</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-lg">
                    <h3 class="text-2xl font-semibold text-blue-600">{{ $lapangan }}</h3>
                    <p class="text-gray-600 mt-2">Lapangan</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-lg">
                    <h3 class="text-2xl font-semibold text-blue-600">{{ $aula }}</h3>
                    <p class="text-gray-600 mt-2">Aula</p>
                </div>
            </div>
        </div>
    </section>

    <!-- DAFTAR FASILITAS -->
    <section id="fasilitas" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Daftar Fasilitas Umum</h2>
                <a href="{{ route('fasilitas.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition duration-200">
                    + Daftarkan Fasilitas
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if (isset($fasilitas) && count($fasilitas) > 0)
                    @foreach ($fasilitas as $item)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 hover:shadow-xl">
                            <div class="h-48 bg-gray-200 overflow-hidden">
                                <img src="{{ $item->foto && file_exists(public_path('uploads/' . $item->foto))
                                    ? asset('uploads/' . $item->foto)
                                    : asset('assets/images/default.jpg') }}"
                                    alt="Foto {{ $item->nama }}" class="w-full h-full object-cover">
                            </div>

                            <div class="p-5">
                                <span
                                    class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                    @if ($item->jenis == 'Lapangan') bg-green-100 text-green-800
                                    @elseif($item->jenis == 'Aula') bg-yellow-100 text-yellow-800
                                    @else bg-blue-100 text-blue-800 @endif mb-2">
                                    {{ $item->jenis }}
                                </span>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $item->nama }}</h3>
                                <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                                    {{ $item->deskripsi ?? 'Deskripsi belum tersedia.' }}
                                </p>

                                <div class="space-y-1 text-sm text-gray-700 mb-4">
                                    <p class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0L6.343 16.657a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $item->alamat }}
                                    </p>
                                    <p class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0l-1.429-9.998A7.996 7.996 0 0119 8h-1M12 21V11">
                                            </path>
                                        </svg>
                                        Kapasitas: {{ $item->kapasitas ?? 'Tidak Terbatas' }}
                                    </p>
                                </div>

                                <div class="flex justify-between items-center mt-4">
                                    <a href="{{ route('fasilitas.edit', $item) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold py-2 px-4 rounded-lg transition duration-200">
                                        ✏️ Edit
                                    </a>

                                    <form action="{{ route('fasilitas.destroy', $item) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus fasilitas {{ $item->nama }} ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white text-sm font-semibold py-2 px-4 rounded-lg transition duration-200">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="md:col-span-3 text-center py-10">
                        <p class="text-xl text-gray-500">Belum ada data fasilitas yang tersedia.</p>
                    </div>
                @endif
            </div>

            @if (isset($fasilitas))
                <div class="mt-8">
                    {{ $fasilitas->links() }}
                </div>
            @endif
        </div>
    </section>

    <!-- KONTAK -->
    <section id="kontak" class="bg-blue-50 py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Hubungi Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Untuk informasi lebih lanjut tentang peminjaman ruang atau fasilitas lainnya, silakan hubungi pihak
                pengelola desa.
            </p>
        </div>
    </section>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

@endsection
