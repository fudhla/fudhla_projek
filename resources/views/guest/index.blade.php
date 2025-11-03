<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Fasilitas Umum Desa</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="./assets/images/favicon.png">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero {
            background-image: url('./assets/images/banner-img1.png');
            background-size: cover;
            background-position: center;
        }

        .hero-overlay {
            background-color: rgba(0, 45, 100, 0.65);
        }

        .nav-link:hover {
            color: #facc15;
        }
    </style>
</head>

<body class="text-gray-800">

    <!-- NAVBAR -->
    <nav class="bg-blue-700 text-white px-6 py-4 shadow-lg flex justify-between items-center">
        <h1 class="text-2xl font-bold">Portal Fasilitas Desa</h1>
        <div class="space-x-6">
            <a href="#" class="nav-link hover:underline">Beranda</a>
            <a href="#fasilitas" class="nav-link hover:underline">Fasilitas</a>
            <a href="#kontak" class="nav-link hover:underline">Kontak</a>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero relative h-[500px] flex items-center justify-center text-center text-white">
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
                <!-- Statistik dihitung berdasarkan data yang dikirim -->
                @php
                    // $fasilitas adalah objek Paginator. total() memberikan jumlah keseluruhan.
                    $total = $fasilitas->total();
                    // where() di Paginator akan memfilter item di halaman saat ini.
                    $lapangan = $fasilitas->where('jenis', 'Lapangan')->count();
                    $aula = $fasilitas->where('jenis', 'Aula')->count();
                @endphp

                <div class="bg-white p-6 rounded-2xl shadow-lg">
                    <h3 class="text-2xl font-semibold text-blue-600" id="totalFasilitas">{{ $total }}</h3>
                    <p class="text-gray-600 mt-2">Total Fasilitas</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-lg">
                    <h3 class="text-2xl font-semibold text-blue-600" id="totalLapangan">{{ $lapangan }}</h3>
                    <p class="text-gray-600 mt-2">Lapangan</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-lg">
                    <h3 class="text-2xl font-semibold text-blue-600" id="totalAula">{{ $aula }}</h3>
                    <p class="text-gray-600 mt-2">Aula</p>
                </div>
            </div>
        </div>
    </section>

    <!-- DAFTAR FASILITAS (Menggunakan Card Tampilan) -->
    <section id="fasilitas" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Daftar Fasilitas Umum</h2>
                <!-- Link ke halaman create -->
                <a href="{{ url('fasilitas/create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition duration-200">
                    + Daftarkan Fasilitas
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- LOOPING DATA DARI CONTROLLER (Tampilan Card) --}}
                @forelse ($fasilitas as $item)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 hover:shadow-xl">
                        <!-- Area Foto -->
                        <div class="h-48 bg-gray-200 overflow-hidden">
                            @if ($item->foto)
                                <img src="{{ asset('uploads/' . ltrim($item->foto, '/')) }}"
                                    alt="Foto {{ $item->nama }}" class="w-full h-full object-cover">
                            @else
                                <!-- Placeholder jika tidak ada foto -->
                                <div class="w-full h-full flex items-center justify-center text-gray-500 bg-gray-100">
                                    <span class="text-lg">Tidak ada Foto</span>
                                </div>
                            @endif
                        </div>

                        <!-- Area Konten Card -->
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
                                {{ $item->deskripsi ?? 'Deskripsi belum tersedia.' }}</p>

                            <div class="space-y-1 text-sm text-gray-700">
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
                        </div>
                    </div>
                @empty
                    <div class="md:col-span-3 text-center py-10">
                        <p class="text-xl text-gray-500">Belum ada data fasilitas yang tersedia.</p>
                    </div>
                @endforelse

            </div>

            <!-- Pagination Links -->
            <div class="mt-8">
                {{ $fasilitas->links() }}
            </div>

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

    <!-- FOOTER -->
    <footer class="bg-blue-700 text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p class="text-lg font-semibold">Portal Fasilitas Umum Desa</p>
            <p class="text-sm mt-2 text-blue-100">© {{ date('Y') }} Desa Sejahtera | Semua Hak Dilindungi</p>
        </div>
    </footer>

    <!-- FIREBASE -->
    <script type="module">
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/10.12.1/firebase-app.js";
        import {
            getDatabase,
            ref,
            onValue
        } from "https://www.gstatic.com/firebasejs/10.12.1/firebase-database.js";

        const firebaseConfig = {
            apiKey: "AIzaSyExample",
            authDomain: "fasilitasdesa.firebaseapp.com",
            databaseURL: "https://fasilitasdesa-default-rtdb.firebaseio.com",
            projectId: "fasilitasdesa",
            storageBucket: "fasilitasdesa.appspot.com",
            messagingSenderId: "1234567890",
            appId: "1:1234567890:web:abcdefghijk"
        };

        const app = initializeApp(firebaseConfig);
        const db = getDatabase(app);

        const fasilitasRef = ref(db, "fasilitas_umum");

        onValue(fasilitasRef, (snapshot) => {
            const data = snapshot.val();
            const tbody = document.getElementById("fasilitasTable");
            tbody.innerHTML = "";

            if (data) {
                let total = 0,
                    lapangan = 0,
                    aula = 0;
                Object.values(data).forEach(item => {
                    total++;
                    if (item.jenis?.toLowerCase().includes("lapangan")) lapangan++;
                    if (item.jenis?.toLowerCase().includes("aula")) aula++;

                    tbody.innerHTML += `
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">${item.nama || '-'}</td>
                            <td class="py-3 px-4">${item.jenis || '-'}</td>
                            <td class="py-3 px-4">${item.alamat || '-'}</td>
                            <td class="py-3 px-4">${item.kapasitas || '-'}</td>
                            <td class="py-3 px-4">${item.deskripsi || '-'}</td>
                        </tr>
                    `;
                });

                document.getElementById("totalFasilitas").textContent = total;
                document.getElementById("totalLapangan").textContent = lapangan;
                document.getElementById("totalAula").textContent = aula;
            } else {
                tbody.innerHTML =
                    `<tr><td colspan="5" class="text-center py-6 text-gray-500">Belum ada data fasilitas.</td></tr>`;
            }
        });
    </script>

</body>

</html>
