@extends('layouts.guest.app')

@section('content')
     {{-- CONTENT --}}


            <!-- Form -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4 shadow-sm">
                    <h5 class="mb-4 text-center text-primary">Formulir Pengajuan Peminjaman Fasilitas Umum</h5>

                    <!-- Notifikasi Sukses -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Notifikasi Error -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama </label>
                                <input type="text" name="nama" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Jenis Fasilitas</label>
                                <select name="jenis" class="form-select" required>
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="Aula">Aula</option>
                                    <option value="Lapangan">Lapangan</option>
                                    <option value="Perpustakaan">Perpustakaan</option>
                                    <option value="Balai Desa">Balai Desa</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label">Alamat Fasilitas</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat lengkap fasilitas" required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">RT</label>
                                <input type="text" name="rt" class="form-control" required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">RW</label>
                                <input type="text" name="rw" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Kapasitas (Orang)</label>
                                <input type="number" name="kapasitas" class="form-control" placeholder="Masukkan kapasitas" required>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Deskripsi Fasilitas</label>
                                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Tuliskan deskripsi singkat fasilitas" required></textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload Foto / Dokumen Pendukung</label>
                            <input type="file" name="media" class="form-control" accept="image/*,application/pdf">
                            <small class="text-muted">Opsional — dapat berupa foto (JPG/PNG) atau file PDF</small>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary px-5">
                                <i class="fa fa-paper-plane me-2"></i>Ajukan Peminjaman
                            </button>
                            <a href="{{ route('fasilitas.tampilan') }}" class="btn btn-outline-secondary px-4">
                                <i class="fa fa-eye me-2"></i>Lihat Semua Fasilitas
                            </a>
                        </div>
                    </form>
                </div>
            </div>
         {{-- END FORM --}}


@endsection
