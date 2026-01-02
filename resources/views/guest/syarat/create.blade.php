@extends('layouts.guest.app')

@section('content')
    <div class="p-6 bg-gray-50 min-h-screen flex justify-center">
        <div class="w-full max-w-2xl">

            {{-- Tombol Kembali --}}
            <div class="mb-4">
                <a href="{{ route('syarat.index') }}"
                    class="text-gray-500 hover:text-blue-600 flex items-center text-sm font-medium transition-colors group">
                    <svg class="w-4 h-4 mr-1 transform group-hover:-translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Daftar
                </a>
            </div>

            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
                {{-- Header Card --}}
                <div class="bg-blue-600 p-6 text-white">
                    <div class="flex items-center gap-3">
                        <div class="p-3 bg-blue-500 rounded-lg">
                            <i class="fas fa-file-signature text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold uppercase tracking-tight">Tambah Syarat</h3>
                            <p class="text-blue-100 text-xs opacity-80">Lengkapi formulir di bawah untuk menambah ketentuan
                                fasilitas.</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('syarat.store') }}" method="POST" class="p-8 space-y-6"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- Pilih Fasilitas --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Fasilitas
                            Umum</label>
                        <div class="relative">
                            <select name="fasilitas_id"
                                class="w-full pl-4 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all appearance-none cursor-pointer text-gray-700 font-medium">
                                <option value="" disabled selected>-- Pilih Fasilitas Terkait --</option>
                                @foreach ($fasilitas as $f)
                                    <option value="{{ $f->fasilitas_id }}">{{ $f->nama }}</option>
                                @endforeach
                            </select>
                            <div
                                class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-400">
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Nama Syarat --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Nama
                            Syarat</label>
                        <div class="relative">
                            <input type="text" name="nama_syarat" placeholder="Misal: Fotocopy KTP Warga"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all text-gray-700 font-medium">
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Deskripsi
                            Lengkap</label>
                        <textarea name="deskripsi" rows="4" placeholder="Jelaskan detail syarat di sini..."
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all text-gray-700"></textarea>
                        <p class="mt-2 text-[10px] text-gray-400 italic font-medium tracking-wide">*Deskripsi ini akan
                            tampil saat warga melakukan peminjaman.</p>
                    </div>
                    {{-- Dokumen Syarat --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">
                            Dokumen / Foto Syarat
                        </label>

                        <input type="file" name="foto" accept="image/*"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl">

                        <p class="text-[10px] text-gray-400 italic mt-1">
                            *Opsional. JPG / PNG
                        </p>
                    </div>


                    {{-- Tombol Submit --}}
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-100 transition-all transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-2">
                            <i class="fas fa-save"></i> SIMPAN DATA SYARAT
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
