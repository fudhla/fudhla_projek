@extends('layouts.guest.app')

@section('content')
    <section class="py-16">
        <div class="container mx-auto px-6 max-w-3xl">
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h2 class="text-2xl font-bold text-blue-600 text-center mb-8">
                    Formulir Peminjaman Fasilitas
                </h2>

                <form action="{{ route('pinjam.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Fasilitas --}}
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">Nama Fasilitas</label>
                        <input type="text" name="fasilitas" value="{{ old('fasilitas') }}"
                            class="w-full border border-gray-300 rounded-lg p-3 bg-white focus:ring-2 focus:ring-blue-500 outline-none"
                            required>
                    </div>

                    {{-- Warga --}}
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">Nama Warga</label>
                        <select name="warga_id"
                            class="w-full border border-gray-300 rounded-lg p-3 bg-white focus:ring-2 focus:ring-blue-500 outline-none"
                            required>
                            <option value="">-- Pilih Warga --</option>
                            @foreach ($warga as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tanggal Mulai & Selesai --}}
                    <div class="flex gap-4 mb-5">
                        <div class="w-1/2">
                            <label class="block font-semibold text-gray-700 mb-2">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                                required>
                        </div>

                        <div class="w-1/2">
                            <label class="block font-semibold text-gray-700 mb-2">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                                required>
                        </div>
                    </div>

                    {{-- Tujuan --}}
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">Tujuan Peminjaman</label>
                        <textarea name="tujuan" rows="3"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                            placeholder="Contoh: Acara rapat RT, latihan seni, kegiatan olahraga" required>{{ old('tujuan') }}</textarea>
                    </div>

                    {{-- Total Biaya --}}
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">Total Biaya</label>
                        <input type="number" name="total_biaya"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                            placeholder="Contoh: 150000" required>
                    </div>

                    {{-- Bukti Bayar --}}
                    <div class="mb-8">
                        <label class="block font-semibold text-gray-700 mb-2">Upload Bukti Bayar (Opsional)</label>
                        <input type="file" name="bukti_bayar"
                            class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none
                               file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0
                               file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-between">
                        <a href="{{ route('pinjam.index') }}"
                            class="bg-gray-300 text-gray-700 px-5 py-2 rounded-lg font-medium hover:bg-gray-400 transition">
                            Batal
                        </a>

                        <button type="submit"
                            class="bg-blue-600 text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-700 transition">
                            Simpan Peminjaman
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </section>
@endsection
