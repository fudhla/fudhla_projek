<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Fasilitas Umum - Portal Desa</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero {
            background-image: url('./assets/images/banner-img1.png');
            background-size: cover;
            background-position: center;
        }

        .overlay {
            background-color: rgba(0, 45, 100, 0.7);
        }
    </style>
</head>

<body class="text-gray-800 bg-gray-50">

    <!-- NAVBAR -->
    <nav class="bg-blue-700 text-white px-6 py-4 shadow-lg flex justify-between items-center">
        <h1 class="text-2xl font-bold">Portal Fasilitas Desa</h1>
        <div class="space-x-6">
            <a href="{{ url('/fasilitas') }}" class="hover:text-yellow-400">Beranda</a>
            <a href="#" class="hover:text-yellow-400">Fasilitas</a>
            <a href="#" class="hover:text-yellow-400">Kontak</a>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero relative h-[250px] flex items-center justify-center text-center text-white">
        <div class="overlay absolute inset-0"></div>
        <div class="relative z-10">
            <h1 class="text-4xl font-bold mb-2">Tambah Fasilitas Umum Baru</h1>
            <p class="text-blue-100">Isi data berikut untuk menambahkan fasilitas baru ke daftar desa.</p>
        </div>
    </section>

    <!-- FORM SECTION -->
    <section class="py-16">
        <div class="container mx-auto px-6 max-w-3xl">
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nama Fasilitas -->
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">Nama Fasilitas</label>
                        <input type="text" name="nama"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                            placeholder="Contoh: Balai Desa" value="{{ old('nama') }}" required>
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis -->
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">Jenis Fasilitas</label>
                        <input type="text" name="jenis"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                            placeholder="Contoh: Lapangan, Aula, Pos Ronda" value="{{ old('jenis') }}" required>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">Alamat Lengkap</label>
                        <input type="text" name="alamat"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                            placeholder="Contoh: Jl. Merdeka No. 10" value="{{ old('alamat') }}" required>
                    </div>

                    <!-- RT / RW -->
                    <div class="flex gap-4 mb-5">
                        <div class="w-1/2">
                            <label class="block font-semibold text-gray-700 mb-2">RT</label>
                            <input type="text" name="rt"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                                placeholder="001" value="{{ old('rt') }}">
                        </div>
                        <div class="w-1/2">
                            <label class="block font-semibold text-gray-700 mb-2">RW</label>
                            <input type="text" name="rw"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                                placeholder="002" value="{{ old('rw') }}">
                        </div>
                    </div>

                    <!-- Kapasitas -->
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">Kapasitas (Orang/Unit)</label>
                        <input type="number" name="kapasitas"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                            placeholder="Contoh: 100" value="{{ old('kapasitas') }}">
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" rows="3"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                            placeholder="Jelaskan kondisi dan fungsi fasilitas">{{ old('deskripsi') }}</textarea>
                    </div>

                    <!-- Foto -->
                    <div class="mb-8">
                        <label class="block font-semibold text-gray-700 mb-2">Unggah Foto (Max 2MB)</label>
                        <input type="file" name="foto"
                            class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-between">
                        <a href="{{ route('fasilitas.index') }}"
                            class="bg-gray-300 text-gray-700 px-5 py-2 rounded-lg font-medium hover:bg-gray-400 transition">Batal</a>
                        <button type="submit"
                            class="bg-blue-600 text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-700 transition">Simpan
                            Fasilitas</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-blue-700 text-white py-8 mt-12">
        <div class="container mx-auto text-center">
            <p class="text-lg font-semibold">Portal Fasilitas Umum Desa</p>
            <p class="text-sm text-blue-100 mt-1">© {{ date('Y') }} Desa Sejahtera | Semua Hak Dilindungi</p>
        </div>
    </footer>

</body>

</html>
