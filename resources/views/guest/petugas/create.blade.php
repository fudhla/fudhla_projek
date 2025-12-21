@extends('layouts.guest.app')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen flex justify-center">
    <div class="w-full max-w-2xl">

        {{-- Navigasi Kembali --}}
        <div class="mb-4">
            <a href="{{ route('petugas.index') }}" class="text-gray-500 hover:text-gray-700 flex items-center text-sm font-medium">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Daftar Petugas
            </a>
        </div>

        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
            {{-- Header Card --}}
            <div class="bg-indigo-600 p-6 text-white">
                <h3 class="text-xl font-bold">Tambah Petugas Fasilitas</h3>
                <p class="text-indigo-100 text-sm">Tugaskan warga untuk mengelola fasilitas lingkungan.</p>
            </div>

            <form action="{{ route('petugas.store') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6">
                    {{-- Pilih Fasilitas --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Fasilitas Umum</label>
                        <div class="relative">
                            <select name="fasilitas_id" class="w-full pl-4 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all appearance-none cursor-pointer">
                                <option value="" disabled selected>-- Pilih Fasilitas --</option>
                                @foreach ($fasilitas as $f)
                                    <option value="{{ $f->fasilitas_id }}">{{ $f->nama }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Pilih Warga --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Petugas (Warga)</label>
                        <div class="relative">
                            <select name="petugas_warga_id" class="w-full pl-4 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all appearance-none cursor-pointer">
                                <option value="" disabled selected>-- Pilih Warga --</option>
                                @foreach ($warga as $w)
                                    <option value="{{ $w->id }}">{{ $w->nama }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Peran --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Peran / Jabatan</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <i class="fas fa-user-tag text-sm"></i>
                            </div>
                            <input type="text" name="peran" placeholder="Contoh: Koordinator Kebersihan"
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all">
                        </div>
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-indigo-100 transition-all transform hover:-translate-y-0.5">
                        Simpan Petugas
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
