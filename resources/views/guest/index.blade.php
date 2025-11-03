<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Publik | Fasilitas Desa Makmur</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Load Ikon Bootstrap untuk visual -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Konfigurasi Tailwind (Menggunakan skema warna Biru Polk) -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Warna Biru Cerah yang Dominan pada template Polk
                        'polk-blue-header': '#2196f3',
                        'polk-dark': '#1e1e1e', // Hitam/Abu-abu gelap
                        'polk-light': '#f5f5f5', // Background light
                        'polk-accent': '#00b0ff', // Biru Aksen Lebih Cerah
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- CSS Kustom (Murni CSS) -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f5f5;
            /* Background light */
            color: #1e1e1e;
            padding-top: 80px;
            /* Jarak untuk Fixed Header */
        }

        .header-polk {
            background-color: #2196f3;
            /* Biru Cerah Polk */
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 50;
        }

        .hero-banner {
            /* MENGGANTI URL GAMBAR DENGAN FOTO BALAI DESA REALISTIS (NON-AI) */
            background-image: url('./assets/images/banner-img1.png');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }

        .hero-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
        }

        .polk-card-container {
            /* Container unik yang meniru frame melengkung di homepage Polk */
            background-color: #ffffff;
            border-radius: 2.5rem;
            /* Sudut Sangat Melengkung */
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
            transform: translateY(-80px);
            /* Efek melayang, ditarik ke atas Hero */
            padding: 3rem;
            margin-top: 1rem;
        }

        .card-stat {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-stat:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        /* Responsivitas untuk padding container */
        @media (max-width: 768px) {
            .hero-banner {
                height: 300px;
            }

            .polk-card-container {
                padding: 1.5rem;
                border-radius: 1.5rem;
                transform: translateY(-40px);
            }
        }
    </style>
</head>

<body class="antialiased">

    <!-- BAGIAN 1: HEADER POLK (Navbar Biru Elegan) -->
    <header class="header-polk text-white">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">

            <!-- Logo/Nama Portal -->
            <h1 class="text-3xl font-extrabold tracking-widest text-white">PORTAL DESA</h1>

            <!-- Navigasi Utama -->
            <nav class="hidden md:flex items-center space-x-6">
                <!-- Navigasi Warga, Tentang Kami, dan Login dipindahkan ke kanan, Navigasi Statik di sini disederhanakan/dihapus untuk menghindari duplikasi -->
                <a href="#"
                    class="font-semibold text-polk-dark bg-white py-2 px-4 rounded-full hover:bg-gray-100 transition duration-200">BERANDA</a>
                <a href="#"
                    class="hidden lg:block text-white font-semibold hover:text-polk-dark hover:bg-white py-2 px-4 rounded-full transition duration-200">WARGA</a>
                <a href="#"
                    class="hidden lg:block text-white font-semibold hover:text-polk-dark hover:bg-white py-2 px-4 rounded-full transition duration-200">ABOUT</a>
                <a href="#"
                    class="hidden lg:block text-white font-semibold hover:text-polk-dark hover:bg-white py-2 px-4 rounded-full transition duration-200">USER</a>
            </nav>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="md:hidden text-white">
                <i class="bi bi-list text-2xl"></i>
            </button>
        </div>
    </header>

    <!-- SIDEBAR (Menu Mobile Overlay) -->
    <div id="mobile-menu"
        class="fixed inset-0 bg-polk-dark bg-opacity-95 z-40 hidden md:hidden transition-opacity duration-300">
        <div class="p-6 text-right">
            <button id="close-menu" class="text-white text-3xl">&times;</button>
        </div>
        <nav class="p-4 space-y-4 text-center">
            <a href="#" class="block text-2xl font-semibold text-polk-accent">BERANDA</a>
            <a href="#statistik" class="block text-2xl text-white hover:text-polk-accent">STATISTIK</a>
            <a href="#fasilitas" class="block text-2xl text-white hover:text-polk-accent">FASILITAS</a>
            <a href="#galeri" class="block text-2xl text-white hover:text-polk-accent">GALERI</a>
            <div class="pt-4 border-t border-gray-700">
                <a href="#" class="block text-xl text-white hover:text-polk-accent">WARGA</a>
                <a href="#" class="block text-xl text-white hover:text-polk-accent">TENTANG KAMI</a>
                <a href="#" class="block text-xl text-polk-accent mt-2">LOGIN</a>
            </div>
        </nav>
    </div>

    <!-- BAGIAN 2: HERO SECTION (Foto Besar) -->
    <div class="hero-banner">
        <div class="relative z-10 p-8">
            <h2 class="text-5xl md:text-6xl font-extrabold text-white mb-4 drop-shadow-lg">
                Fasilitas Terbaik untuk Warga Desa
            </h2>
            <p class="text-xl text-white font-medium mb-8 drop-shadow">
                Cek ketersediaan dan informasi fasilitas umum desa secara real-time.
            </p>
            <a href="#fasilitas"
                class="bg-polk-accent px-8 py-3 text-lg font-bold text-white rounded-full shadow-xl hover:bg-polk-blue-header transition duration-300">
                Lihat Fasilitas Sekarang
            </a>
        </div>
    </div>


    <!-- MAIN CONTENT -->
    <main class="flex-1 max-w-6xl mx-auto px-4">

        <!-- Konten Dashboard di dalam frame Polk Unik (Ditarik ke atas Hero) -->
        <div class="polk-card-container">

            <!-- BAGIAN 3: STATISTIK RINGKASAN (CARDS) -->
            <div id="statistik" class="mb-12 pt-10">
                <h3 class="text-3xl font-bold text-polk-dark mb-6 text-center">Data Real-Time Desa</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                    <!-- Card 1: Total Fasilitas Tersedia -->
                    <div class="card-stat bg-polk-light p-6 rounded-xl shadow-md border-b-4 border-polk-blue-header">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-semibold text-gray-500 uppercase">Fasilitas Tersedia</p>
                                <h2 class="text-4xl font-extrabold text-polk-dark mt-1" id="stat-total-fasilitas">0</h2>
                            </div>
                            <i class="bi bi-house-door-fill text-5xl text-polk-accent opacity-30"></i>
                        </div>
                        <span class="text-sm text-gray-500 mt-4 block">Unit siap digunakan</span>
                    </div>

                    <!-- Card 2: Total Peminjaman (Keseluruhan) -->
                    <div class="card-stat bg-polk-light p-6 rounded-xl shadow-md border-b-4 border-yellow-500">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-semibold text-gray-500 uppercase">Total Peminjaman</p>
                                <h2 class="text-4xl font-extrabold text-polk-dark mt-1" id="stat-total-peminjaman">0
                                </h2>
                            </div>
                            <i class="bi bi-graph-up text-5xl text-yellow-500 opacity-30"></i>
                        </div>
                        <span class="text-sm text-gray-500 mt-4 block">Jumlah transaksi tercatat</span>
                    </div>

                    <!-- Card 3: Transaksi Selesai -->
                    <div class="card-stat bg-polk-light p-6 rounded-xl shadow-md border-b-4 border-green-500">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-semibold text-gray-500 uppercase">Transaksi Selesai</p>
                                <h2 class="text-4xl font-extrabold text-polk-dark mt-1" id="stat-transaksi-selesai">0
                                </h2>
                            </div>
                            <i class="bi bi-check-circle-fill text-5xl text-green-500 opacity-30"></i>
                        </div>
                        <span class="text-sm text-gray-500 mt-4 block">Peminjaman yang telah disetujui</span>
                    </div>

                    <!-- Card 4: Total Biaya Terkumpul (Transparansi) -->
                    <div class="card-stat bg-polk-light p-6 rounded-xl shadow-md border-b-4 border-red-500">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-semibold text-gray-500 uppercase">Total Biaya Terkumpul</p>
                                <h2 class="text-4xl font-extrabold text-polk-dark mt-1" id="stat-total-biaya">Rp 0</h2>
                            </div>
                            <i class="bi bi-currency-dollar text-5xl text-red-500 opacity-30"></i>
                        </div>
                        <span class="text-sm text-gray-500 mt-4 block">Untuk pemeliharaan fasilitas</span>
                    </div>
                </div>
            </div>

            <!-- BAGIAN 4: TABEL DAFTAR FASILITAS UMUM -->
            <div id="fasilitas" class="p-6 bg-polk-light rounded-xl shadow-inner mt-12 pt-10">
                <h3 class="text-3xl font-bold text-polk-dark mb-6 text-center border-b pb-3">Daftar Fasilitas Umum Desa
                </h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-polk-dark uppercase tracking-wider">
                                    Nama Fasilitas
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-polk-dark uppercase tracking-wider">
                                    Jenis
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-polk-dark uppercase tracking-wider">
                                    Lokasi (Alamat)
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-polk-dark uppercase tracking-wider">
                                    Kapasitas
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-polk-dark uppercase tracking-wider">
                                    Deskripsi
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-polk-dark uppercase tracking-wider">
                                    Biaya (Per Hari)
                                </th>
                            </tr>
                        </thead>
                        <tbody id="fasilitas-list-body" class="bg-white divide-y divide-gray-100">
                            <tr>
                                <td colspan="6" class="text-center py-4 text-gray-500">Memuat data fasilitas...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-6">
                    <button
                        class="bg-polk-blue-header px-6 py-2 text-white font-semibold rounded-full hover:bg-polk-accent transition duration-300">
                        Ajukan Peminjaman Sekarang
                    </button>
                </div>
            </div>

            <!-- BAGIAN 5: GALERI/GAMBAR PENDUKUNG -->
            <div id="galeri" class="mt-12 pt-10">
                <h3 class="text-3xl font-bold text-polk-dark mb-6 text-center border-b pb-3">Galeri Fasilitas Desa</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <img src="https://placehold.co/400x250/38a169/ffffff?text=Balai+Desa" alt="Foto Balai Desa"
                        class="w-full h-full object-cover rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-[1.02]">
                    <img src="https://placehold.co/400x250/2b6cb0/ffffff?text=Lapangan+Olahraga"
                        alt="Foto Lapangan Olahraga"
                        class="w-full h-full object-cover rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-[1.02]">
                    <img src="https://placehold.co/400x250/805ad5/ffffff?text=Taman+Bermain" alt="Foto Taman Bermain"
                        class="w-full h-full object-cover rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-[1.02]">
                </div>
            </div>

        </div>

    </main>

    <!-- BAGIAN 6: FOOTER -->
    <footer class="bg-polk-dark mt-10">
        <div class="max-w-6xl mx-auto px-4 py-8 text-center">
            <p class="text-sm text-gray-400">&copy; 2024 Portal Desa Makmur. Ditenagai oleh Data Real-Time.</p>
        </div>
    </footer>


    <!-- BAGIAN 7: JAVASCRIPT (Interaksi dan Data Firebase) -->
    <script type="module">
        // Import Firebase modules
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
        import {
            getAuth,
            signInAnonymously,
            signInWithCustomToken
        } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js";
        import {
            getFirestore,
            collection,
            query,
            onSnapshot,
            getDocs
        } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js";

        // --- Setup Environment Variables (MANDATORY) ---
        const appId = typeof __app_id !== 'undefined' ? __app_id : 'default-app-id';
        const firebaseConfig = typeof __firebase_config !== 'undefined' ? JSON.parse(__firebase_config) : null;
        const initialAuthToken = typeof __initial_auth_token !== 'undefined' ? __initial_auth_token : null;

        let db, auth;
        let isAuthReady = false;

        // --- Helper Functions ---

        function formatCurrency(amount) {
            // Memastikan amount adalah number sebelum diformat
            const numericAmount = Number(amount) || 0;
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(numericAmount);
        }

        // --- Render Functions ---

        // Fungsi untuk merender statistik ke cards (Updated for Public View)
        function renderStats(peminjamanData, fasilitasData) {
            const totalFasilitas = fasilitasData.length;
            const totalPeminjaman = peminjamanData.length;
            // Filter status DITERIMA untuk Transaksi Selesai
            const transaksiSelesai = peminjamanData.filter(item => item.status === 'DITERIMA').length;
            // Menghitung total biaya hanya dari peminjaman yang sudah disetujui (DITERIMA)
            const totalBiaya = peminjamanData
                .filter(item => item.status === 'DITERIMA')
                .reduce((sum, item) => sum + (item.biaya || 0), 0);

            document.getElementById('stat-total-fasilitas').textContent = totalFasilitas;
            document.getElementById('stat-total-peminjaman').textContent = totalPeminjaman;
            document.getElementById('stat-transaksi-selesai').textContent = transaksiSelesai;
            document.getElementById('stat-total-biaya').textContent = formatCurrency(totalBiaya);
        }

        // Fungsi BARU untuk merender data fasilitas ke tabel Fasilitas Umum
        function renderFasilitas(data) {
            const tableBody = document.getElementById('fasilitas-list-body');
            tableBody.innerHTML = ''; // Kosongkan tabel

            if (data.length === 0) {
                tableBody.innerHTML =
                    `<tr><td colspan="6" class="text-center py-4 text-gray-500">Tidak ada daftar fasilitas umum yang tersedia saat ini.</td></tr>`;
                return;
            }

            data.forEach(item => {
                // Menggabungkan RT/RW ke Alamat jika tersedia (sesuai skema)
                const alamatLengkap =
                    `${item.alamat || 'N/A'}${item.rt ? `, RT ${item.rt}` : ''}${item.rw ? `/RW ${item.rw}` : ''}`;
                const deskripsiSingkat = (item.deskripsi || 'Fasilitas umum desa.')
                    .substring(0, 50) + '...'; // Potong deskripsi agar tidak terlalu panjang

                const row = document.createElement('tr');
                row.className = 'hover:bg-gray-50 transition-colors';
                row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-polk-dark">${item.nama || 'N/A'}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.jenis || 'Lain-lain'}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">${alamatLengkap}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.kapasitas || 'N/A'} Orang</td>
                    <td class="px-6 py-4 text-sm text-gray-700 max-w-xs overflow-hidden truncate" title="${item.deskripsi || ''}">${deskripsiSingkat}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">${formatCurrency(item.biayaPerHari || 0)}</td>
                `;
                tableBody.appendChild(row);
            });
        }

        // --- Firebase Core Logic ---

        async function setupFirebase() {
            if (!firebaseConfig) {
                console.error("Firebase config is missing.");
                renderFasilitas([]);
                renderStats([], []);
                return;
            }

            try {
                const app = initializeApp(firebaseConfig);
                db = getFirestore(app);
                auth = getAuth(app);

                // 1. Authentication (Sign in anonymously for public view)
                if (initialAuthToken) {
                    await signInWithCustomToken(auth, initialAuthToken);
                } else {
                    await signInAnonymously(auth);
                }
                isAuthReady = true;

                // Define data paths (public data for shared management)
                const peminjamanCollectionPath = `artifacts/${appId}/public/data/peminjaman`;
                const fasilitasCollectionPath =
                    `artifacts/${appId}/public/data/fasilitas_umum`; // Menggunakan nama koleksi baru: fasilitas_umum

                // 2. Real-time Listener for Peminjaman Data (Used for Stats)
                const qPeminjaman = query(collection(db, peminjamanCollectionPath));

                // Listener utama untuk peminjaman (stats)
                onSnapshot(qPeminjaman, async (peminjamanSnapshot) => {
                    if (!isAuthReady) return;

                    const peminjamanList = [];
                    peminjamanSnapshot.forEach((doc) => {
                        peminjamanList.push({
                            id: doc.id,
                            ...doc.data()
                        });
                    });

                    // Fetch Fasilitas data (Untuk List Fasilitas dan Stats)
                    const qFasilitas = query(collection(db, fasilitasCollectionPath));
                    const fasilitasSnapshot = await getDocs(
                        qFasilitas
                    ); // Menggunakan getDocs karena ini hanya perlu diambil sekali/saat perubahan peminjaman
                    const fasilitasList = [];
                    fasilitasSnapshot.forEach((doc) => {
                        // Memastikan item yang diambil memiliki field yang sesuai dengan skema
                        fasilitasList.push({
                            id: doc.id,
                            ...doc.data(),
                            // Tambahkan dummy field biayaPerHari jika belum ada di koleksi
                            biayaPerHari: doc.data().biayaPerHari || 0
                        });
                    });

                    // Update the UI
                    renderFasilitas(fasilitasList); // Render list fasilitas
                    renderStats(peminjamanList, fasilitasList); // Render statistik

                }, (error) => {
                    console.error("Error fetching data from Firestore:", error);
                    renderFasilitas([]);
                    renderStats([], []);
                });

            } catch (error) {
                console.error("Error setting up Firebase:", error);
                renderFasilitas([]);
                renderStats([], []);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Mobile Menu Toggle
            const mobileMenu = document.getElementById('mobile-menu');
            const menuToggle = document.getElementById('menu-toggle');
            const closeMenu = document.getElementById('close-menu');

            menuToggle.addEventListener('click', () => {
                mobileMenu.classList.remove('hidden');
            });

            closeMenu.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });

            // Start Firebase setup
            setupFirebase();
        });
    </script>
</body>

</html>
