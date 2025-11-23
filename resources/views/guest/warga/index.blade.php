@extends('layouts.guest.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto pt-24">

        @if (session('success'))
            <div class="p-4 mb-4 text-white bg-green-500 rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('warga.index') }}" class="mb-6 flex flex-wrap gap-3 items-center">

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau NIK..."
                class="px-3 py-2 w-64 border border-gray-300 rounded-lg bg-white text-gray-800">

            <select name="jenis_kelamin" class="px-3 py-2 border border-gray-300 rounded-lg bg-white text-gray-800">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki" {{ request('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
                Filter
            </button>

        </form>

        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3">
                <div class="relative flex flex-col bg-white shadow-xl rounded-2xl">

                    <div class="p-6 pb-0 border-b flex justify-between items-center">
                        <h6 class="text-lg font-semibold text-slate-700">Daftar Data Warga</h6>

                        <a href="{{ route('warga.create') }}"
                            class="px-4 py-2 text-xs font-bold text-white uppercase bg-blue-500 rounded-lg shadow-md hover:-translate-y-px transition-all">
                            <i class="fa fa-plus mr-1"></i> Tambah Warga
                        </a>
                    </div>

                    <div class="p-6">
                        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">

                            @forelse ($wargas as $warga)
                                <div
                                    class="bg-white rounded-xl border border-gray-100 p-6 shadow-md hover:shadow-lg hover:-translate-y-1 transition-all">

                                    <div class="flex items-center mb-4 space-x-4">
                                        <div
                                            class="h-14 w-14 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white text-lg font-bold shadow-md">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-base font-semibold text-slate-800">{{ $warga->nama }}</h4>
                                            <p class="text-xs text-gray-500">NIK: {{ $warga->nik }}</p>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap gap-2 mb-4">
                                        <span
                                            class="px-2 py-0.5 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                            {{ $warga->jenis_kelamin }}
                                        </span>

                                        @if ($warga->no_hp)
                                            <span
                                                class="px-2 py-0.5 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                                <i class="fa fa-phone mr-1"></i> {{ $warga->no_hp }}
                                            </span>
                                        @endif

                                        <span
                                            class="px-2 py-0.5 text-xs font-medium rounded-full bg-purple-100 text-purple-800"
                                            title="{{ $warga->alamat }}">
                                            <i class="fa fa-map-marker mr-1"></i>
                                            {{ Str::limit($warga->alamat, 25, '...') }}
                                        </span>
                                    </div>

                                    <div class="flex justify-between pt-3 border-t border-gray-100">
                                        <a href="{{ route('warga.edit', $warga) }}"
                                            class="text-xs font-semibold text-blue-600 hover:text-blue-800">
                                            <i class="fa fa-edit mr-1"></i> Edit
                                        </a>

                                        <form action="{{ route('warga.destroy', $warga) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus data warga {{ $warga->nama }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-xs font-semibold text-red-600 hover:text-red-800">
                                                <i class="fa fa-trash mr-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            @empty
                                <div class="w-full text-center py-10 sm:col-span-2 lg:col-span-3">
                                    <p class="text-base text-slate-500">Belum ada data Warga yang tercatat.</p>
                                </div>
                            @endforelse

                        </div>

                        <div class="mt-6">
                            {{ $wargas->appends(request()->query())->links('pagination::tailwind') }}
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
