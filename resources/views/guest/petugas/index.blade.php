@extends('layouts.guest.app')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Petugas Fasilitas</h1>
            <p class="text-gray-500 mt-1">Daftar warga yang bertugas mengelola fasilitas umum.</p>
        </div>
        <div>
            <a href="{{ route('petugas.create') }}"
                class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-xl shadow-lg shadow-blue-200 transition-all duration-200 transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Petugas
            </a>
        </div>
    </div>

    {{-- Grid Card Petugas --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($data as $item)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300 overflow-hidden flex flex-col">
                <div class="p-5 flex-grow">
                    {{-- Badge Fasilitas --}}
                    <div class="flex justify-between items-start mb-4">
                        <div class="bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1 rounded-lg uppercase tracking-wider">
                            <i class="fas fa-building mr-1"></i> {{ $item->fasilitas->nama }}
                        </div>
                    </div>

                    {{-- Nama Petugas --}}
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-bold text-lg mr-4 border-2 border-white shadow-sm">
                            {{ strtoupper(substr($item->warga->nama, 0, 1)) }}
                        </div>
                        <div>
                            <label class="block text-xs text-gray-400 font-semibold uppercase">Nama Petugas</label>
                            <p class="text-lg font-bold text-gray-800 leading-tight">{{ $item->warga->nama }}</p>
                        </div>
                    </div>

                    {{-- Peran Petugas --}}
                    <div class="pt-4 border-t border-gray-50">
                        <label class="block text-xs text-gray-400 font-semibold uppercase mb-1">Peran / Tanggung Jawab</label>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-100 text-green-800">
                            <i class="fas fa-user-tag mr-2 text-xs"></i> {{ $item->peran }}
                        </span>
                    </div>
                </div>

                {{-- Action Footer --}}
                <div class="bg-gray-50 px-5 py-3 flex justify-end gap-3 border-t border-gray-100">
                    <a href="{{ route('petugas.edit', $item->petugas_id) }}"
                        class="text-amber-600 hover:text-amber-700 text-sm font-bold flex items-center transition-colors px-3 py-1 rounded-lg hover:bg-amber-50">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Petugas
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-2xl p-12 text-center border-2 border-dashed border-gray-200">
                <div class="bg-gray-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-shield text-gray-400 text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Belum ada petugas</h3>
                <p class="text-gray-500">Silahkan tambah petugas untuk mengelola fasilitas yang tersedia.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
