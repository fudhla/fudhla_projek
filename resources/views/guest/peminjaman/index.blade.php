@extends('layouts.guest.app')

@section('content')
    <div class="p-6">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">Daftar Peminjaman Fasilitas</h1>

        <div class="mb-6">
            <a href="{{ route('pinjam.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                + Tambah Peminjaman
            </a>
        </div>

        <form method="GET" action="{{ route('pinjam.index') }}" class="flex items-center gap-3 mb-6">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari warga..."
                class="px-3 py-2 border rounded-lg w-60">

            <select name="status" class="px-3 py-2 border rounded-lg">
                <option value="">-- Status --</option>
                <option value="Disetujui" {{ request('status') == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Filter
            </button>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($peminjamans as $item)
                <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">

                    {{-- Fasilitas --}}
                    <p class="text-gray-700 text-sm mb-2">
                        <span class="font-semibold">Fasilitas:</span>
                        {{ $item->fasilitas ?? '-' }}
                    </p>

                    <p class="text-gray-600 text-sm mb-1">
                        <span class="font-medium">Dipinjam oleh:</span>
                        {{ $item->warga->nama ?? '-' }}
                    </p>

                    <p class="text-gray-600 text-sm mb-1">
                        <span class="font-medium">Tanggal:</span>
                        {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }} -
                        {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}
                    </p>

                    <span
                        class="inline-block mt-3 px-3 py-1 text-sm rounded-full
                        @if ($item->status == 'Pending') bg-yellow-100 text-yellow-700
                        @elseif($item->status == 'Disetujui') bg-green-100 text-green-700
                        @else bg-red-100 text-red-700 @endif">
                        {{ $item->status }}
                    </span>

                    <div class="flex justify-end space-x-2 mt-4">
                        <a href="{{ route('pinjam.show', $item->pinjam_id) }}"
                            class="text-green-600 hover:text-green-800 font-medium">Detail</a>

                        <a href="{{ route('pinjam.edit', $item) }}"
                            class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>

                        <form action="{{ route('pinjam.destroy', $item) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                        </form>

                    </div>

                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $peminjamans->appends(request()->query())->links('pagination::tailwind') }}
        </div>

    </div>
@endsection
