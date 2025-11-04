@extends('layouts.guest.app')

@section('content')
    <!-- FORM SECTION -->
    <section class="py-16">
        <div class="container mx-auto px-6 max-w-3xl">
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nama Fasilitas -->
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">Nama Fasilitas</label>
                        <input type="text" name="nama"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                            placeholder="Contoh: Balai Desa" value="{{ old('nama') }}" required>
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis -->
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">Jenis Fasilitas</label>
                        <input type="text" name="jenis"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                            placeholder="Contoh: Lapangan, Aula, Pos Ronda" value="{{ old('jenis') }}" required>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">Alamat Lengkap</label>
                        <input type="text" name="alamat"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                            placeholder="Contoh: Jl. Merdeka No. 10" value="{{ old('alamat') }}" required>
                    </div>

                    <!-- RT / RW -->
                    <div class="flex gap-4 mb-5">
                        <div class="w-1/2">
                            <label class="block font-semibold text-gray-700 mb-2">RT</label>
                            <input type="text" name="rt"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                                placeholder="001" value="{{ old('rt') }}">
                        </div>
                        <div class="w-1/2">
                            <label class="block font-semibold text-gray-700 mb-2">RW</label>
                            <input type="text" name="rw"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                                placeholder="002" value="{{ old('rw') }}">
                        </div>
                    </div>

                    <!-- Kapasitas -->
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">Kapasitas (Orang/Unit)</label>
                        <input type="number" name="kapasitas"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                            placeholder="Contoh: 100" value="{{ old('kapasitas') }}">
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" rows="3"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                            placeholder="Jelaskan kondisi dan fungsi fasilitas">{{ old('deskripsi') }}</textarea>
                    </div>

                    <!-- Foto -->
                    <div class="mb-8">
                        <label class="block font-semibold text-gray-700 mb-2">Unggah Foto (Max 2MB)</label>
                        <input type="file" name="foto"
                            class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-between">
                        <a href="{{ route('fasilitas.index') }}"
                            class="bg-gray-300 text-gray-700 px-5 py-2 rounded-lg font-medium hover:bg-gray-400 transition">Batal</a>
                        <button type="submit"
                            class="bg-blue-600 text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-700 transition">Simpan
                            Fasilitas</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
