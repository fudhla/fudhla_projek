@extends('layouts.guest.app')

@section('content')
    <div class="p-6 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-2xl shadow-sm">

            <h3 class="text-2xl font-bold mb-6">Edit Pembayaran</h3>

            {{-- FOTO SAAT INI --}}
            @php
                $foto = $pembayaran->media->first();
            @endphp

            <div class="mb-5">
                <label class="block text-sm font-semibold mb-2">Bukti Pembayaran</label>
                <img src="{{ $foto ? asset('storage/' . $foto->file_url) : asset('asset/img/default-payment.jpg') }}"
                    class="w-full h-48 object-cover rounded-xl border">
            </div>

            <form action="{{ route('pembayaran.update', $pembayaran->bayar_id) }}" method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="grid gap-4">
                    <div>
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" value="{{ $pembayaran->tanggal }}"
                            class="w-full rounded-xl border px-4 py-2">
                    </div>

                    <div>
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" value="{{ $pembayaran->jumlah }}"
                            class="w-full rounded-xl border px-4 py-2">
                    </div>

                    <div>
                        <label>Metode</label>
                        <input type="text" name="metode" value="{{ $pembayaran->metode }}"
                            class="w-full rounded-xl border px-4 py-2">
                    </div>

                    <div>
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="w-full rounded-xl border px-4 py-2">{{ $pembayaran->keterangan }}</textarea>
                    </div>

                    {{-- UPLOAD FOTO BARU --}}
                    <div>
                        <label class="block font-semibold">Ganti Foto (Opsional)</label>
                        <input type="file" name="images[]" multiple class="w-full border rounded-xl px-4 py-2">
                    </div>
                </div>
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-xl">
                        Update Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
