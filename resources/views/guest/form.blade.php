<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Formulir Pengajuan Peminjaman Ruang - DesaKu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-xxl position-relative bg-white d-flex p-0">

    <!-- Sidebar -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="{{ url('/') }}" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-home me-2"></i>DesaKu</h3>
            </a>
            <div class="navbar-nav w-100">
                <a href="{{ url('/') }}" class="nav-item nav-link"><i class="fa fa-building me-2"></i>Fasilitas Desa</a>
                <a href="{{ route('form.create') }}" class="nav-item nav-link active"><i class="fa fa-calendar-check me-2"></i>Formulir Peminjaman</a>
                <a href="#" class="nav-item nav-link"><i class="fa fa-info-circle me-2"></i>Tentang Desa</a>
            </div>
        </nav>
    </div>

    <!-- Content -->
    <div class="content">
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="#" class="sidebar-toggler flex-shrink-0"><i class="fa fa-bars"></i></a>
            <h4 class="ms-3 mt-2">Formulir Pengajuan Peminjaman Ruang</h4>
            <div class="navbar-nav ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-user me-lg-2" style="font-size: 24px;"></i>
                        <span class="d-none d-lg-inline-flex">Tamu/Login</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 m-0">
                        <a href="#" class="dropdown-item">Login</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded p-4">

                <h5 class="mb-4 text-primary"><i class="fa fa-edit me-2"></i>Isi Data Pengajuan Peminjaman Fasilitas</h5>
                <p class="text-muted">Mohon lengkapi semua kolom di bawah ini dengan benar. Status peminjaman akan dikonfirmasi oleh Admin Desa.</p>

                <hr>

                <!-- Alert Sukses/Error -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="nama_peminjam" class="col-sm-3 col-form-label">Nama Lengkap Pemohon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" placeholder="Contoh: Budi Santoso" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="no_ktp" class="col-sm-3 col-form-label">Nomor KTP/Identitas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Isi tanpa spasi atau tanda baca" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="kontak" class="col-sm-3 col-form-label">Nomor HP/WA Aktif</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control" id="kontak" name="kontak" placeholder="Contoh: 081234567890" required>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row mb-3">
                        <label for="nama_fasilitas" class="col-sm-3 col-form-label">Pilih Fasilitas/Ruang</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="nama_fasilitas" name="fasilitas_id" required>
                                <option selected disabled value="">Pilih Ruang/Fasilitas...</option>
                                @foreach($fasilitas as $f)
                                    <option value="{{ $f->fasilitas_id }}">{{ $f->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tujuan" class="col-sm-3 col-form-label">Nama/Tujuan Kegiatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Contoh: Rapat Koordinasi RT 03 / Latihan Voli" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tanggal_mulai" class="col-sm-3 col-form-label">Tanggal Mulai Pinjam</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tanggal_selesai" class="col-sm-3 col-form-label">Tanggal Selesai Pinjam</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row mb-3">
                        <label for="surat_permohonan" class="col-sm-3 col-form-label">Surat Permohonan Resmi</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="surat_permohonan" name="surat_permohonan" accept=".pdf,.jpg,.png" required>
                            <div class="form-text">Maksimal ukuran file 2MB (format PDF/JPG/PNG).</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="keterangan" class="col-sm-3 col-form-label">Keterangan Tambahan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Jelaskan detail waktu atau kebutuhan khusus lainnya."></textarea>
                        </div>
                    </div>

                    <div class="mt-4 pt-2 border-top text-end">
                        <button type="reset" class="btn btn-secondary me-2"><i class="fa fa-undo"></i> Reset</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Ajukan Permintaan</button>
                    </div>
                </form>

            </div>
        </div>

        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded-top p-4 text-center">
                <small>&copy; 2025 DesaKu - Sistem Informasi Fasilitas & Peminjaman Ruang</small>
            </div>
        </div>
    </div>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
