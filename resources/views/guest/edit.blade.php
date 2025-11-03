@extends('layouts.guest.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mb-6 sm:w-8/12 lg:w-8/12 xl:w-7/12 mx-auto">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                    <div class="p-6 mb-0 text-center bg-gray-200 rounded-t-2xl">
                        <h4 class="text-gray-800 font-bold">Edit Fasilitas: {{ $fasilitas->nama }}</h4>
                        <p class="text-sm text-gray-600">Perbarui informasi fasilitas di bawah ini.</p>
                    </div>

                    <div class="flex-auto p-6">
                        {{-- Menggunakan route fasilitas.update dan method PUT --}}
                        <form action="{{ route('fasilitas.update', $fasilitas->fasilitas_id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-slate-700">Nama Fasilitas</label>
                                <input type="text" name="nama"
                                    class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                                    placeholder="Contoh: Balai Desa" value="{{ old('nama', $fasilitas->nama) }}" required>
                                @error('nama')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-slate-700">Jenis Fasilitas</label>
                                <input type="text" name="jenis"
                                    class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                                    placeholder="Contoh: Gedung, Lapangan, Pos Ronda"
                                    value="{{ old('jenis', $fasilitas->jenis) }}" required>
                                @error('jenis')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-slate-700">Alamat Lengkap</label>
                                <input type="text" name="alamat"
                                    class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                                    placeholder="Contoh: Jl. Merdeka No. 12" value="{{ old('alamat', $fasilitas->alamat) }}"
                                    required>
                                @error('alamat')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex space-x-4 mb-4">
                                <div class="w-1/2">
                                    <label class="block text-sm font-medium text-slate-700">RT (Opsional)</label>
                                    <input type="text" name="rt"
                                        class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                                        placeholder="001" value="{{ old('rt', $fasilitas->rt) }}">
                                </div>
                                <div class="w-1/2">
                                    <label class="block text-sm font-medium text-slate-700">RW (Opsional)</label>
                                    <input type="text" name="rw"
                                        class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                                        placeholder="002" value="{{ old('rw', $fasilitas->rw) }}">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-slate-700">Kapasitas (Orang/Unit)</label>
                                <input type="number" name="kapasitas"
                                    class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                                    placeholder="Contoh: 100" value="{{ old('kapasitas', $fasilitas->kapasitas) }}">
                                @error('kapasitas')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-slate-700">Deskripsi</label>
                                <textarea name="deskripsi" rows="3"
                                    class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                                    placeholder="Jelaskan fungsi dan kondisi fasilitas">{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label class="block text-sm font-medium text-slate-700">Ganti Foto (Max 2MB) - Saat ini:
                                    @if ($fasilitas->foto)
                                        <a href="{{ asset('storage/' . $fasilitas->foto) }}" target="_blank"
                                            class="text-blue-500">Lihat Foto</a>
                                    @else
                                        Tidak ada
                                    @endif
                                </label>
                                <input type="file" name="foto"
                                    class="w-full mt-1 p-2 border rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                                @error('foto')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-end mt-6">
                                <a href="{{ route('fasilitas.index') }}"
                                    class="px-4 py-2 mr-2 text-sm text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</a>
                                <button type="submit"
                                    class="px-4 py-2 text-sm text-white bg-green-600 rounded-lg hover:bg-green-700">Perbarui
                                    Fasilitas</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
