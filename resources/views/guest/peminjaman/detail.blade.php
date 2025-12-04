@extends('layouts.guest.app')

@section('content')
    <div class="p-6">

        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">Detail Peminjaman</h1>

            <a href="{{ route('pinjam.index') }}"
                class="bg-gray-300 text-gray-700 px-5 py-2 rounded-lg font-medium hover:bg-gray-400 transition">
                Kembali
            </a>
        </div>

        <div class="bg-white shadow p-6 rounded-xl border">

            <p><strong>Fasilitas:</strong> {{ $data->fasilitas }}</p>
            <p><strong>Warga:</strong> {{ $data->warga->nama }}</p>
            <p><strong>Tanggal:</strong> {{ $data->tanggal_mulai }} - {{ $data->tanggal_selesai }}</p>
            <p><strong>Tujuan:</strong> {{ $data->tujuan }}</p>
            <p><strong>Total Biaya:</strong> Rp {{ number_format($data->total_biaya) }}</p>
            <p><strong>Status:</strong> {{ $data->status }}</p>

            <hr class="my-4">

            <h2 class="font-semibold text-lg mb-3">Bukti Pembayaran</h2>

            @forelse ($data->media as $m)
                <div class="mb-4">
                    <p class="text-sm text-gray-600">{{ $m->caption }}</p>

                    @if (str_contains($m->mime_type, 'image'))
                        <img src="{{ asset('storage/' . $m->file_url) }}" class="w-64 rounded-lg border">
                    @else
                        <a href="{{ asset('storage/' . $m->file_url) }}" class="text-blue-600 underline" target="_blank">
                            Lihat File
                        </a>
                    @endif
                </div>
            @empty
                <p class="text-gray-500">Tidak ada bukti pembayaran diunggah.</p>
            @endforelse

        </div>

    </div>
@endsection
