@extends('layouts.guest.app') {{-- Pastikan layout ini mengimpor Tailwind CSS --}}

@section('title', 'Profil Pengembang')

@section('content')

    <style>
        /* Menggunakan Tailwind classes untuk konsistensi */
        .text-pcr-blue {
            color: #3b82f6; /* Blue-500 */
        }
        .bg-pcr-blue {
            background-color: #3b82f6;
        }
        .bg-pcr-blue:hover {
            background-color: #2563eb; /* Blue-600 */
        }
        .contact-title-dark {
            color: #1e293b; /* Slate-800 */
        }
        .contact-card-split {
            background-color: #ffffff;
            border: 1px solid #e2e8f0; /* Slate-200 */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Garis Pemisah Vertikal (Hanya di Layar Besar) */
        @media (min-width: 768px) {
            .border-r-md {
                border-right: 1px solid #e2e8f0; /* Slate-200 border */
            }
        }

        /* Gaya Foto Profil */
        .profile-photo-container {
            width: 120px;
            height: 120px;
            padding: 4px;
            background: #3b82f6;
            border-radius: 9999px; /* rounded-full */
            margin-bottom: 1rem;
        }
        .profile-img-split {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border: 4px solid #ffffff;
            border-radius: 9999px; /* rounded-full */
        }

        /* Gaya Ikon Sosial Media */
        .social-circle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 9999px; /* rounded-full */
            text-decoration: none;
            color: #ffffff;
            background-color: #3b82f6;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
        }

        .social-circle:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            background-color: #2563eb;
        }

        /* Font Awesome harus dimuat di layout utama */
        .fa { font-family: 'Font Awesome 6 Free'; font-weight: 900; }

    </style>

    <div class="py-12 mt-4 bg-gray-50 min-h-screen"> {{-- Padding & Background --}}
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8"> {{-- Container lebar 4xl, di tengah --}}

            <div class="contact-card-split rounded-xl p-8 md:p-10 shadow-xl">

                <h2 class="text-3xl font-extrabold text-center mb-10 contact-title-dark">Profil Pengembang Web</h2>

                {{-- Grid Utama (Menggantikan row/col Bootstrap) --}}
                <div class="md:grid md:grid-cols-12">

                    {{-- Kolom Kiri: Identitas & Info Kontak (col-span-5) --}}
                    <div class="md:col-span-5 md:pr-10 md:border-r border-gray-200 text-center md:text-left mb-8 md:mb-0">

                        {{-- FOTO PROFIL --}}
                        <div class="profile-photo-container mx-auto md:mx-0">
                            <img src="{{ asset('assets/images/foto.png') }}"
                                alt="Foto Pengembang"
                                class="profile-img-split">
                        </div>

                        {{-- DETAIL IDENTITAS --}}
                        <h4 class="text-xl font-bold mb-1 contact-title-dark">Fudhla Aulia</h4>
                        <p class="text-gray-600 mb-1">NIM: **2457301059**</p>
                        <p class="text-gray-500 text-sm mb-6">Kelas: **2 SI D**</p>

                        {{-- INFORMASI KONTAK --}}
                        <div class="border-t pt-4 mt-4">
                            <h5 class="text-lg font-bold mb-3 contact-title-dark">Detail Kontak</h5>

                            <div class="space-y-4"> {{-- Menggantikan d-grid gap-3 --}}

                                {{-- Email --}}
                                <div class="flex items-start justify-center md:justify-start">
                                    <i class="fas fa-envelope fa-lg contact-icon mr-3 text-pcr-blue mt-1" style="width: 20px;"></i>
                                    <div>
                                        <small class="text-gray-500 text-xs font-semibold block">Email</small>
                                        <a href="mailto:fudhla24si@mahasiswa.pcr.ac.id" class="text-sm text-gray-800 font-medium hover:text-pcr-blue transition">fudhla24si@mahasiswa.pcr.ac.id</a>
                                    </div>
                                </div>

                                {{-- Telepon --}}
                                <div class="flex items-start justify-center md:justify-start">
                                    <i class="fas fa-phone fa-lg contact-icon mr-3 text-pcr-blue mt-1" style="width: 20px;"></i>
                                    <div>
                                        <small class="text-gray-500 text-xs font-semibold block">Telepon</small>
                                        <span class="text-sm text-gray-800 font-medium">+62 819 5633 5472</span>
                                    </div>
                                </div>

                                {{-- Alamat --}}
                                <div class="flex items-start justify-center md:justify-start">
                                    <i class="fas fa-map-marker-alt fa-lg contact-icon mr-3 mt-1 text-pcr-blue" style="width: 20px;"></i>
                                    <div>
                                        <small class="text-gray-500 text-xs font-semibold block">Alamat</small>
                                        <p class="text-sm text-gray-800 font-medium">
                                            Jl. Rowo Sari No. XX, Kota Pekanbaru, Riau
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Kolom Kanan: Sosial Media & Aksi (col-span-7) --}}
                    <div class="md:col-span-7 md:pl-10">

                        <h4 class="text-xl font-bold mb-3 contact-title-dark text-center md:text-left">Social Media & Portofolio</h4>
                        <p class="text-gray-600 mb-6 text-center md:text-left text-sm">
                            Hubungi atau lihat proyek terbaru saya melalui platform media sosial dan portofolio di bawah ini.
                        </p>

                        {{-- Ikon Sosial Media Lingkaran --}}
                        <div class="flex gap-4 social-icons-list justify-center md:justify-start mb-8">

                            {{-- LinkedIn --}}
                            <a href="https://www.linkedin.com/in/username" target="_blank" class="social-circle" title="LinkedIn">
                                <i class="fab fa-linkedin-in fa-lg"></i>
                            </a>
                            {{-- GitHub --}}
                            <a href="https://github.com/username" target="_blank" class="social-circle" title="GitHub">
                                <i class="fab fa-github fa-lg"></i>
                            </a>
                            {{-- Instagram --}}
                            <a href="https://instagram.com/username" target="_blank" class="social-circle" title="Instagram">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                            {{-- Facebook --}}
                            <a href="https://facebook.com/username" target="_blank" class="social-circle" title="Facebook">
                                <i class="fab fa-facebook-f fa-lg"></i>
                            </a>
                        </div>

                        {{-- Tombol Aksi (Kirim Pesan) --}}
                        <div class="flex justify-center md:justify-start">
                            <a href="mailto:fudhla24si@mahasiswa.pcr.ac.id"
                                class="flex items-center text-white px-6 py-3 rounded-lg font-bold transition shadow-md bg-pcr-blue hover:bg-pcr-blue">
                                Kirim Pesan Melalui Email
                                <i class="fas fa-paper-plane ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
