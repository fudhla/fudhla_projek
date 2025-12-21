@extends('layouts.guest.app')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Riwayat Pembayaran</h1>
            <p class="text-gray-500 mt-1">Pantau seluruh data transaksi pembayaran fasilitas Anda.</p>
        </div>
        <div>
            <a href="{{ route('pembayaran.create') }}"
                class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-xl shadow-lg shadow-blue-200 transition-all duration-200 transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Pembayaran
            </a>
        </div>
    </div>

    {{-- Info Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($pembayaran as $item)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300 overflow-hidden flex flex-col">
                <div class="p-5 flex-grow">
                    {{-- Badge Tanggal & Metode --}}
                    <div class="flex justify-between items-start mb-4">
                        <div class="bg-blue-50 text-blue-700 text-xs font-bold px-3 py-1 rounded-lg uppercase tracking-wider">
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                        </div>
                        <span class="flex items-center text-xs text-gray-400 font-medium italic">
                            <i class="fas fa-wallet mr-1 text-blue-400"></i> {{ $item->metode }}
                        </span>
                    </div>

                    {{-- Jumlah Pembayaran --}}
                    <div class="mb-4">
                        <label class="block text-xs text-gray-400 font-semibold uppercase mb-1">Total Pembayaran</label>
                        <p class="text-2xl font-bold text-gray-800">
                            <span class="text-gray-400 text-lg font-medium">Rp</span> {{ number_format($item->jumlah, 0, ',', '.') }}
                        </p>
                    </div>

                    {{-- Keterangan --}}
                    <div class="pt-4 border-t border-gray-50">
                        <label class="block text-xs text-gray-400 font-semibold uppercase mb-1">Keterangan</label>
                        <p class="text-gray-600 text-sm leading-relaxed italic">
                            "{{ $item->keterangan ?? 'Tidak ada catatan' }}"
                        </p>
                    </div>
                </div>

                {{-- Action Footer --}}
                <div class="bg-gray-50 px-5 py-3 flex justify-end gap-3 border-t border-gray-100">
                    <a href="{{ route('pembayaran.edit', $item->bayar_id) }}"
                        class="text-amber-600 hover:text-amber-700 text-sm font-bold flex items-center transition-colors">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Data
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-2xl p-12 text-center border-2 border-dashed border-gray-200">
                <div class="bg-gray-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Belum ada pembayaran</h3>
                <p class="text-gray-500">Silahkan klik tombol "Tambah Pembayaran" untuk mencatat transaksi.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination (Optional) --}}
    @if(method_exists($pembayaran, 'links'))
    <div class="mt-8">
        {{ $pembayaran->links('pagination::tailwind') }}
    </div>
    @endif
</div>
@endsection
