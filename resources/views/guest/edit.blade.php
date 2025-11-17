@extends('layouts.guest.app')

@section('content')
    <div class="container mx-auto px-6 py-16">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-2xl">
            <h1 class="text-3xl font-bold text-gray-900 mb-6 border-b pb-4">
                Edit Fasilitas Umum: {{ $fasilitas->nama }}
            </h1>

            {{-- Form edit --}}
            <form action="{{ route('fasilitas.update', $fasilitas->fasilitas_id) }}" method="POST">


                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-5">
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Fasilitas</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $fasilitas->nama) }}"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500"
                        required>
                    @error('nama')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jenis --}}
                <div class="mb-5">
                    <label for="jenis" class="block text-sm font-medium text-gray-700 mb-1">Jenis Fasilitas</label>
                    <select name="jenis" id="jenis"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option value="">Pilih Jenis</option>
                        @foreach (['Lapangan', 'Aula', 'Tempat Ibadah', 'Lainnya'] as $jenis)
                            <option value="{{ $jenis }}"
                                {{ old('jenis', $fasilitas->jenis) == $jenis ? 'selected' : '' }}>
                                {{ $jenis }}
                            </option>
                        @endforeach
                    </select>
                    @error('jenis')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Alamat, RT/RW --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-5">
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $fasilitas->alamat) }}"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500"
                            required>
                        @error('alamat')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="rt" class="block text-sm font-medium text-gray-700 mb-1">RT</label>
                        <input type="text" name="rt" id="rt" value="{{ old('rt', $fasilitas->rt) }}"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500">
                        @error('rt')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="rw" class="block text-sm font-medium text-gray-700 mb-1">RW</label>
                        <input type="text" name="rw" id="rw" value="{{ old('rw', $fasilitas->rw) }}"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500">
                        @error('rw')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Kapasitas --}}
                <div class="mb-5">
                    <label for="kapasitas" class="block text-sm font-medium text-gray-700 mb-1">Kapasitas (Opsional)</label>
                    <input type="number" name="kapasitas" id="kapasitas"
                        value="{{ old('kapasitas', $fasilitas->kapasitas) }}"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500">
                    @error('kapasitas')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="mb-5">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500" required>{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Foto --}}
                <div class="mb-5">
                    <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Foto (Kosongkan jika tidak
                        diubah)</label>
                    @if ($fasilitas->foto)
                        <p class="text-xs text-gray-500 mb-2">Foto saat ini:
                            <a href="{{ asset('uploads/' . ltrim($fasilitas->foto, '/')) }}" target="_blank"
                                class="text-blue-600 hover:underline">Lihat Foto</a>
                        </p>
                    @endif
                    <input type="file" name="foto" id="foto"
                        class="w-full border border-gray-300 rounded-lg p-3 file:mr-4 file:py-2 file:px-4
                           file:rounded-lg file:border-0 file:text-sm file:font-semibold
                           file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    @error('foto')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('fasilitas.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-lg transition duration-200">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
