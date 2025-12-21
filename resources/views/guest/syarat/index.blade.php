@extends('layouts.guest.app')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Syarat Fasilitas</h1>
            <p class="text-gray-500 mt-1">Ketentuan dan persyaratan untuk penggunaan fasilitas umum.</p>
        </div>
        <div>
            <a href="{{ route('syarat.create') }}"
                class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-xl shadow-lg shadow-blue-200 transition-all duration-200 transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Syarat
            </a>
        </div>
    </div>

    {{-- Grid Card Syarat --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($data as $item)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 overflow-hidden flex flex-col group">
                <div class="p-6 flex-grow">
                    {{-- Nama Fasilitas (Badge Biru) --}}
                    <div class="mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold bg-blue-50 text-blue-700 uppercase tracking-wider">
                            <i class="fas fa-info-circle mr-1.5"></i>
                            {{ $item->fasilitas->nama ?? 'Fasilitas Umum' }}
                        </span>
                    </div>

                    {{-- Konten Syarat --}}
                    <div class="flex items-start gap-4">
                        <div class="hidden sm:flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-600 group-hover:scale-110 transition-transform">
                            <i class="fas fa-file-signature text-sm"></i>
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-1">Nama Syarat / Ketentuan</label>
                            <p class="text-gray-700 font-medium leading-relaxed">
                                {{ $item->nama_syarat }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Footer Action --}}
                <div class="bg-gray-50 px-6 py-4 flex justify-end border-t border-gray-100">
                    <a href="{{ route('syarat.edit', $item->syarat_id) }}"
                        class="inline-flex items-center text-blue-600 hover:text-blue-800 font-bold text-sm transition-colors group/btn">
                        <span>Edit Syarat</span>
                        <svg class="w-4 h-4 ml-1 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @empty
            {{-- Tampilan jika data kosong --}}
            <div class="col-span-full bg-white rounded-3xl p-16 text-center border-2 border-dashed border-gray-200">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-50 text-blue-400 rounded-full mb-6">
                    <i class="fas fa-clipboard-list text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Belum ada syarat</h3>
                <p class="text-gray-500 mt-2">Daftar syarat kosong. Silahkan tambahkan syarat baru.</p>
                <a href="{{ route('syarat.create') }}" class="mt-6 inline-block text-blue-600 font-bold hover:underline">Tambah Sekarang</a>
            </div>
        @endforelse
    </div>
</div>
@endsection
