@extends('layouts.guest.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4">
    <div class="max-w-2xl mx-auto">

        {{-- Tombol Kembali --}}
        <div class="mb-6">
            <a href="{{ route('fasilitas.index') }}" class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Data Fasilitas
            </a>
        </div>

        {{-- Main Card --}}
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">

            {{-- Header Card --}}
            <div class="bg-gradient-to-r from-blue-700 to-blue-600 px-8 py-6">
                <h3 class="text-xl font-bold text-white flex items-center">
                    <svg class="w-6 h-6 mr-3 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit Syarat Layanan
                </h3>
                <p class="text-blue-100 text-sm mt-1 italic">Perbarui informasi dokumen persyaratan dengan teliti.</p>
            </div>

            <div class="p-8">
                <form action="{{ route('syarat.update', $syarat->syarat_id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Nama Syarat --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Syarat</label>
                        <input type="text" name="nama_syarat" value="{{ $syarat->nama_syarat }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none"
                               placeholder="Contoh: Fotokopi KTP">
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Lengkap</label>
                        <textarea name="deskripsi" rows="4"
                                  class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none"
                                  placeholder="Jelaskan detail persyaratan di sini...">{{ $syarat->deskripsi }}</textarea>
                    </div>

                    {{-- Preview Gambar --}}
                    <div class="bg-gray-50 p-4 rounded-2xl border-2 border-dashed border-gray-200">
                        <label class="block text-sm font-bold text-gray-500 mb-3 uppercase tracking-wider text-center">Dokumen Saat Ini</label>

                        @php $foto = $syarat->media->first(); @endphp
                        <div class="relative group mx-auto max-w-sm">
                            <img src="{{ $foto ? asset('storage/' . $foto->file_url) : asset('assets/images/default.jpg') }}"
                                 class="w-full h-56 object-cover rounded-xl shadow-md border-4 border-white transition-transform group-hover:scale-[1.02]">

                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition rounded-xl flex items-center justify-center">
                                <span class="text-white text-xs font-bold bg-black/50 px-3 py-1 rounded-full">Preview Dokumen</span>
                            </div>
                        </div>
                    </div>

                    {{-- Upload File --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Ganti Dokumen <span class="text-gray-400 font-normal text-xs">(Opsional)</span></label>
                        <div class="relative">
                            <input type="file" name="foto"
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition transition-all cursor-pointer">
                        </div>
                        <p class="mt-2 text-[11px] text-gray-400 italic">*Format file: JPG, PNG atau PDF. Ukuran maks 2MB.</p>
                    </div>

                    <hr class="border-gray-100 my-2">

                    {{-- Tombol Aksi --}}
                    <div class="flex items-center justify-end space-x-3 pt-2">
                        <button type="reset" class="px-6 py-2.5 text-sm font-bold text-gray-500 hover:text-gray-700 transition">
                            Reset
                        </button>
                        <button type="submit" class="px-8 py-2.5 bg-blue-700 hover:bg-blue-800 text-white font-bold rounded-xl shadow-lg shadow-blue-200 transition-all transform hover:-translate-y-0.5 active:scale-95 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>

        {{-- Footer Form --}}
        <p class="text-center text-gray-400 text-xs mt-8 uppercase tracking-widest font-semibold">
            &copy; 2026 Portal Desa Digital - Manajemen Fasilitas
        </p>

    </div>
</div>
@endsection
