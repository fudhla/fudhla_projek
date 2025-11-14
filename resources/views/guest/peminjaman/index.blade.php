@extends('layouts.guest.app')

@section('content')
<div class="p-6">

    <h1 class="text-3xl font-bold text-gray-800 mb-6">Daftar Peminjaman Fasilitas</h1>

    <!-- Tombol Tambah -->
    <div class="mb-6">
        <a href="{{ route('pinjam.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
            + Tambah Peminjaman
        </a>
    </div>

    <!-- Grid Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($datas as $item)
            <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">

                <!-- Nama Fasilitas -->
                <h2 class="text-xl font-semibold text-gray-800 mb-2">
                    {{ $item->fasilitas->nama_fasilitas ?? '-' }}
                </h2>

                <!-- Nama Warga -->
                <p class="text-gray-600 text-sm mb-1">
                    <span class="font-medium">Dipinjam oleh:</span>
                    {{ $item->warga->nama ?? '-' }}
                </p>

                <!-- Tanggal Peminjaman -->
                <p class="text-gray-600 text-sm mb-1">
                    <span class="font-medium">Tanggal:</span>
                    {{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->format('d M Y') }}
                </p>

                <!-- Status -->
                <span class="inline-block mt-3 px-3 py-1 text-sm rounded-full
                    @if($item->status == 'Dipinjam') bg-yellow-100 text-yellow-700
                    @elseif($item->status == 'Selesai') bg-green-100 text-green-700
                    @else bg-gray-100 text-gray-700
                    @endif">
                    {{ $item->status }}
                </span>

                <!-- Buttons -->
                <div class="flex justify-end space-x-2 mt-4">

                    <!-- Edit -->
                    <a href="{{ route('pinjam.edit', $item->pinjam_id) }}"
                        class="text-blue-600 hover:text-blue-800 font-medium">
                        Edit
                    </a>

                    <!-- Delete -->
                    <form action="{{ route('pinjam.destroy', $item->pinjam_id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:text-red-800 font-medium">
                            Hapus
                        </button>
                    </form>

                </div>

            </div>
        @endforeach

    </div>

</div>
@endsection
