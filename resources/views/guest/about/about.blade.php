@extends('layouts.guest.app')

@section('content')

{{-- Navbar --}}
<nav
    class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start bg-transparent"
    navbar-main navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <nav>
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-slate-500" href="javascript:;">Pages</a>
                </li>
                <li
                    class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-slate-500 before:content-['/']"
                    aria-current="page">
                    About Portal Fasilitas
                </li>
            </ol>
            <h6 class="mb-0 font-bold text-slate-700 capitalize">
                About Portal Fasilitas Desa
            </h6>
        </nav>
    </div>
</nav>
{{-- End Navbar --}}

<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-xl rounded-2xl p-8">

                {{-- Header --}}
                <div class="text-center mb-10">
                    <i class="fas fa-building text-5xl text-blue-500 mb-3"></i>
                    <h1 class="text-2xl font-extrabold mb-2 text-slate-800">
                        Portal Fasilitas Umum Desa
                    </h1>
                    <p class="text-sm leading-relaxed text-slate-600 max-w-3xl mx-auto">
                        Portal ini menyediakan informasi lengkap tentang fasilitas umum yang tersedia di desa Anda.
                        Mulai dari lapangan, aula, hingga tempat pelayanan masyarakat.
                    </p>
                </div>

                {{-- Fitur --}}
                <h2 class="text-xl font-bold mb-6 text-slate-800 border-b pb-2 border-slate-100">
                    Fitur & Tujuan
                </h2>

                <div class="flex flex-wrap -mx-3 mb-8">

                    {{-- Lapangan --}}
                    <div class="w-full lg:w-1/3 px-3 mb-6">
                        <div
                            class="bg-white p-6 rounded-xl border-t-4 border-green-500 shadow-md">
                            <i class="fas fa-futbol text-2xl mb-3 text-green-500"></i>
                            <h3 class="font-bold text-lg mb-2">
                                1. Informasi Lapangan
                            </h3>
                            <p class="text-sm text-slate-600">
                                Daftar lapangan desa lengkap dengan kapasitas dan lokasi.
                            </p>
                        </div>
                    </div>

                    {{-- Aula --}}
                    <div class="w-full lg:w-1/3 px-3 mb-6">
                        <div
                            class="bg-white p-6 rounded-xl border-t-4 border-yellow-500 shadow-md">
                            <i class="fas fa-building text-2xl mb-3 text-yellow-500"></i>
                            <h3 class="font-bold text-lg mb-2">
                                2. Informasi Aula
                            </h3>
                            <p class="text-sm text-slate-600">
                                Data aula desa beserta fasilitas dan kapasitas.
                            </p>
                        </div>
                    </div>

                    {{-- Layanan --}}
                    <div class="w-full lg:w-1/3 px-3 mb-6">
                        <div
                            class="bg-white p-6 rounded-xl border-t-4 border-blue-500 shadow-md">
                            <i class="fas fa-users text-2xl mb-3 text-blue-500"></i>
                            <h3 class="font-bold text-lg mb-2">
                                3. Layanan Publik
                            </h3>
                            <p class="text-sm text-slate-600">
                                Informasi fasilitas pelayanan masyarakat desa.
                            </p>
                        </div>
                    </div>

                </div>

                {{-- Footer Card --}}
                <div class="mt-4 border-t border-slate-100 pt-4 text-center">
                    <p class="text-xs text-slate-400">
                        Dibangun dengan Laravel Framework | Hak Cipta &copy; 2025
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- Floating WhatsApp --}}
<a href="https://wa.me/6282184244159?text=Halo%2C%20saya%20punya%20pertanyaan%20mengenai%20Portal%20Fasilitas%20Desa."
   target="_blank"
   class="fab-whatsapp fixed bottom-6 right-6 bg-green-500 text-white p-4 rounded-full shadow-lg">
    <i class="fab fa-whatsapp text-xl"></i>
</a>

@endsection
