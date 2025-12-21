@extends('layouts.guest.app')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-2xl mx-auto">
        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Tambah Pembayaran</h1>
            <p class="text-gray-500">Silahkan isi formulir di bawah untuk mencatat transaksi baru.</p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form action="{{ route('pembayaran.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 gap-6">
                    {{-- Peminjaman --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Peminjaman Fasilitas</label>
                        <select name="pinjam_id" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                            <option value="" disabled selected>-- Pilih Fasilitas yang Dipinjam --</option>
                            @forelse ($peminjaman as $p)
                                <option value="{{ $p->pinjam_id }}">
                                    {{ $p->fasilitas->nama ?? 'Fasilitas #'.$p->pinjam_id }} - {{ $p->warga->nama ?? 'Umum' }}
                                </option>
                            @empty
                                <option value="" disabled>Tidak ada data peminjaman tersedia</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Tanggal --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Bayar</label>
                            <input type="date" name="tanggal" value="{{ date('Y-m-d') }}"
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500">
                        </div>

                        {{-- Metode --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Metode</label>
                            <select name="metode" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500">
                                <option value="Transfer">Transfer</option>
                                <option value="Tunai">Tunai</option>
                                <option value="E-Wallet">E-Wallet</option>
                            </select>
                        </div>
                    </div>

                    {{-- Jumlah --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah (Rp)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-2.5 text-gray-400 font-medium">Rp</span>
                            <input type="number" name="jumlah" placeholder="0"
                                class="w-full pl-12 pr-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    {{-- Keterangan --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan</label>
                        <textarea name="keterangan" rows="3" placeholder="Contoh: Pembayaran lunas untuk sewa lapangan"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                    <a href="{{ route('pembayaran.index') }}" class="text-gray-400 hover:text-gray-600 font-medium px-4">Batal</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-2.5 rounded-xl shadow-lg shadow-blue-100 transition-all">
                        Simpan Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
