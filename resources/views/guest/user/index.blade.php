@extends('layouts.guest.app')

@section('content')
    <!-- KONTEN UTAMA -->
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 sm:flex-none">

                <!-- Header Halaman -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Daftar User</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Kelola semua akun pengguna di sini.</p>
                </div>

                <!-- Bagian Notifikasi -->
                @if (session('success'))
                    <div class="relative px-4 py-3 mb-4 text-green-800 bg-green-100 border border-green-400 rounded-lg dark:bg-green-900 dark:text-green-200">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Search -->
                <form action="{{ route('user.index') }}" method="GET" class="flex items-center gap-3 mb-4">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama atau email..."
                        class="px-3 py-2 border rounded-lg w-64 bg-white dark:bg-slate-800 text-gray-800 dark:text-white">

                    <button type="submit"
                        class="px-4 py-2 text-sm font-bold text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                        Cari
                    </button>
                </form>

                <!-- Tombol Tambah User -->
                <div class="mb-4 flex justify-end">
                    <a href="{{ route('user.create') }}"
                        class="inline-block px-4 py-2 text-sm font-bold leading-normal text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 shadow-md">
                        <i class="fa fa-plus-circle mr-1"></i> Tambah User
                    </a>
                </div>

                <!-- Card untuk Tabel -->
                <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-slate-850 shadow-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead class="bg-gray-200 dark:bg-slate-700">
                                    <tr>
                                        <th class="py-3 px-4 text-sm font-semibold text-left text-gray-800 dark:text-gray-200">No</th>
                                        <th class="py-3 px-4 text-sm font-semibold text-left text-gray-800 dark:text-gray-200">Nama</th>
                                        <th class="py-3 px-4 text-sm font-semibold text-left text-gray-800 dark:text-gray-200">Email</th>
                                        <th class="py-3 px-4 text-sm font-semibold text-left text-gray-800 dark:text-gray-200">Role</th>
                                        <th class="py-3 px-4 text-sm font-semibold text-center text-gray-800 dark:text-gray-200">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $user)
                                        <tr class="border-t border-gray-200 dark:border-slate-700 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">
                                            <td class="py-3 px-4 text-sm text-gray-800 dark:text-gray-200">{{ $index + 1 }}</td>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900 dark:text-white">{{ $user->name }}</td>
                                            <td class="py-3 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $user->email }}</td>
                                            <td class="py-3 px-4 text-sm text-gray-700 dark:text-gray-300">{{ ucfirst($user->role) }}</td>

                                            <td class="py-3 px-4 text-center text-sm">
                                                <div class="flex justify-center items-center space-x-3">

                                                    <!-- Edit -->
                                                    <a href="{{ route('user.edit', $user->id) }}"
                                                        class="inline-flex items-center px-4 py-1.5 text-xs font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 shadow-sm">
                                                        <i class="fa fa-edit mr-1"></i> Edit
                                                    </a>

                                                    <!-- Hapus -->
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus user ini?')" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="inline-flex items-center px-4 py-1.5 text-xs font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700 shadow-sm">
                                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if ($users->isEmpty())
                                        <tr>
                                            <td colspan="5" class="py-5 text-center text-gray-600 dark:text-gray-400">
                                                Belum ada data user.
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            <div class="mt-4">
                                {{ $users->appends(request()->query())->links('pagination::tailwind') }}
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
