<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fasilitas Desa & Peminjaman Ruang</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

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
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-home me-2"></i>DesaKu</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="#" class="nav-item nav-link active"><i class="fa fa-building me-2"></i>Fasilitas Desa</a>
<a href="{{ route('fasilitas.create') }}" class="nav-item nav-link"><i class="fa fa-calendar-check me-2"></i>Formulir Peminjaman</a>
                    <a href="#" class="nav-item nav-link"><i class="fa fa-info-circle me-2"></i>Tentang Desa</a>
                    </div>
            </nav>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0"><i class="fa fa-bars"></i></a>
                <h4 class="ms-3 mt-2">Informasi Fasilitas Desa & Jadwal Ruang</h4>
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
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-university fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Fasilitas</p>
                                <h6 class="mb-0">15</h6> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-door-open fa-3x text-success"></i>
                            <div class="ms-3">
                                <p class="mb-2">Ruang Untuk Disewa</p>
                                <h6 class="mb-0">6</h6> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-calendar-minus fa-3x text-warning"></i>
                            <div class="ms-3">
                                <p class="mb-2">Sedang Dipinjam Hari Ini</p>
                                <h6 class="mb-0">2</h6> </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-handshake fa-3x text-info"></i>
                            <div class="ms-3">
                                <p class="mb-2">Pengajuan Minggu Ini</p>
                                <h6 class="mb-0">7</h6> </div>
                        </div>
                    </div>
                </div>
            </div>
            ---

            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex justify-content-between mb-4">
                        <h6 class="mb-0">Daftar Fasilitas Desa</h6>
                        <span class="text-muted fst-italic">Informasi publik</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-primary text-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Fasilitas</th>
                                    <th>Jenis</th>
                                    <th>Kondisi</th>
                                    <th>Status Ketersediaan</th>
                                    <th>Lihat Detail</th> </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Balai Desa Serbaguna</td> <td>Bangunan/Ruang</td>
                                    <td>Sangat Baik</td> <td><span class="badge bg-success">Tersedia</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info" title="Lihat Detail Fasilitas"><i class="fa fa-eye"></i></a>
                                        </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Lapangan Olahraga</td>
                                    <td>Area Terbuka</td> <td>Baik</td>
                                    <td><span class="badge bg-danger">Sedang Digunakan</span></td> <td>
                                        <a href="#" class="btn btn-sm btn-info" title="Lihat Detail Fasilitas"><i class="fa fa-eye"></i></a>
                                        </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Perpustakaan Desa</td>
                                    <td>Bangunan/Ruang</td>
                                    <td>Baik</td>
                                    <td><span class="badge bg-success">Tersedia</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info" title="Lihat Detail Fasilitas"><i class="fa fa-eye"></i></a>
                                        </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            ---

            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex justify-content-between mb-4">
                        <h6 class="mb-0">Jadwal Peminjaman Ruang (Publik)</h6>
                        <a href="#" class="btn btn-success btn-sm"><i class="fa fa-calendar-plus me-1"></i>Ajukan Peminjaman</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-success text-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ruang</th>
                                    <th>Kegiatan</th> <th>Tanggal Mulai</th> <th>Tanggal Selesai</th> <th>Status</th>
                                    <th>Keterangan</th> </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Balai Desa Serbaguna</td>
                                    <td>Rapat RT 03</td> <td>2025-10-15</td>
                                    <td>2025-10-15</td> <td><span class="badge bg-warning">Berlangsung</span></td>
                                    <td>
                                        <span class="text-muted">Lihat Jadwal</span> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Lapangan Olahraga</td>
                                    <td>Latihan Voli</td> <td>2025-10-20</td> <td>2025-10-20</td> <td><span class="badge bg-info">Terjadwal</span></td>
                                    <td>
                                        <span class="text-muted">Lihat Jadwal</span> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            ---

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
