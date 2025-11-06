<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Portal Fasilitas</title>
    @include('layouts.guest.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .module-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .module-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 25px -5px rgba(0, 0, 0, 0.2);
        }

        .decorative-icon {
            opacity: 0.1;
            font-size: 5rem;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .fab-whatsapp {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 30px;
            right: 30px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50%;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .fab-whatsapp:hover {
            background-color: #128c7e;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .fab-whatsapp i {
            font-size: 28px;
        }
    </style>
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

    @include('layouts.guest.header')

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">

        {{-- Navbar --}}
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start bg-transparent"
            navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="text-slate-500" href="javascript:;">Pages</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-slate-500 before:content-['/']"
                            aria-current="page">About Portal Fasilitas</li>
                    </ol>
                    <h6 class="mb-0 font-bold text-slate-700 capitalize">About Portal Fasilitas Desa</h6>
                </nav>
            </div>
        </nav>
        {{-- End Navbar --}}

        <div class="w-full px-6 py-6 mx-auto">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border p-8">

                        <div class="text-center mb-10">
                            <i class="fas fa-building text-5xl text-blue-500 mb-3"></i>
                            <h1 class="text-2xl font-extrabold mb-2 text-slate-800">Portal Fasilitas Umum Desa</h1>
                            <p class="text-sm leading-relaxed text-slate-600 max-w-3xl mx-auto">
                                Portal ini menyediakan informasi lengkap tentang fasilitas umum yang tersedia di desa
                                Anda. Mulai dari lapangan, aula, hingga tempat pelayanan masyarakat, semuanya tercatat
                                dan mudah diakses.
                            </p>
                        </div>

                        <!-- MODUL UTAMA SECTION -->
                        <h2 class="text-xl font-bold mb-6 text-slate-800 border-b pb-2 border-slate-100">Fitur & Tujuan
                        </h2>
                        <div class="flex flex-wrap -mx-3 mb-8">

                            <!-- Card Modul 1: Lapangan -->
                            <div class="w-full lg:w-1/3 max-w-full px-3 mb-6">
                                <div
                                    class="module-card bg-white p-6 rounded-xl text-slate-700 border-t-4 border-green-500 shadow-md">
                                    <i class="fas fa-futbol text-2xl mb-3 text-green-500"></i>
                                    <h3 class="font-bold text-lg mb-2">1. Informasi Lapangan</h3>
                                    <p class="text-sm leading-relaxed text-slate-600">
                                        Menampilkan daftar lapangan yang tersedia, kapasitas, dan lokasi untuk kegiatan
                                        masyarakat.
                                    </p>
                                    <i class="fas fa-futbol decorative-icon text-green-200"></i>
                                </div>
                            </div>

                            <!-- Card Modul 2: Aula -->
                            <div class="w-full lg:w-1/3 max-w-full px-3 mb-6">
                                <div
                                    class="module-card bg-white p-6 rounded-xl text-slate-700 border-t-4 border-yellow-500 shadow-md">
                                    <i class="fas fa-building text-2xl mb-3 text-yellow-500"></i>
                                    <h3 class="font-bold text-lg mb-2">2. Informasi Aula</h3>
                                    <p class="text-sm leading-relaxed text-slate-600">
                                        Menyediakan data aula atau gedung pertemuan desa, kapasitas, dan deskripsi
                                        fasilitas.
                                    </p>
                                    <i class="fas fa-building decorative-icon text-yellow-200"></i>
                                </div>
                            </div>

                            <!-- Card Modul 3: Layanan Publik -->
                            <div class="w-full lg:w-1/3 max-w-full px-3 mb-6">
                                <div
                                    class="module-card bg-white p-6 rounded-xl text-slate-700 border-t-4 border-blue-500 shadow-md">
                                    <i class="fas fa-users text-2xl mb-3 text-blue-500"></i>
                                    <h3 class="font-bold text-lg mb-2">3. Layanan Publik</h3>
                                    <p class="text-sm leading-relaxed text-slate-600">
                                        Informasi tentang fasilitas pelayanan masyarakat seperti kantor desa, posyandu,
                                        dan layanan administrasi.
                                    </p>
                                    <i class="fas fa-users decorative-icon text-blue-200"></i>
                                </div>
                            </div>
                        </div>

                        <!-- FOOTER / CATATAN -->
                        <div class="mt-4 border-t border-slate-100 pt-4 text-center">
                            <p class="text-xs text-slate-400">
                                Dibangun dengan Laravel Framework | Hak Cipta &copy; 2025
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            @include('layouts.guest.footer')
        </div>
    </main>

    <!-- FLOATING ACTION BUTTON WHATSAPP -->
    <a href="https://wa.me/6282184244159?text=Halo%2C%20saya%20punya%20pertanyaan%20mengenai%20Portal%20Fasilitas%20Desa."
        target="_blank" class="fab-whatsapp">
        <i class="fab fa-whatsapp"></i>
    </a>

    @include('layouts.guest.js')
</body>

</html>
