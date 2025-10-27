<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tentang Aplikasi DesaKu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0" style="min-height:100vh;">

        <!-- Sidebar -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light flex-column align-items-start px-3 py-4">
                <a href="#" class="navbar-brand mx-4 mb-3 w-100 text-center">
                    <h3 class="text-primary"><i class="fa fa-home me-2"></i>DesaKu</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="{{ url('/fasilitas/create') }}" class="nav-item nav-link">
                        <i class="fa fa-calendar-check me-2"></i>Formulir Peminjaman
                    </a>
                    <a href="{{ url('/fasilitas/tampilan') }}" class="nav-item nav-link">
                        <i class="fa fa-list me-2"></i>Data Fasilitas
                    </a>
                    <a href="{{ url('/about') }}" class="nav-item nav-link active">
                        <i class="fa fa-info-circle me-2"></i>Tentang
                    </a>
                </div>
            </nav>
        </div>

        <!-- Content -->
        <div class="content flex-grow-1 p-4">
            <h3 class="text-center text-primary mb-4">Tentang Aplikasi DesaKu</h3>

            <div class="bg-light rounded p-4 shadow-sm">
                <p>
                    Aplikasi <strong>DesaKu</strong> adalah sistem informasi digital yang membantu warga desa dalam
                    proses peminjaman fasilitas umum seperti balai desa, aula, dan lapangan. Tujuannya untuk menciptakan
                    layanan yang efisien, transparan, dan mudah diakses masyarakat.
                </p>

                <h5 class="mt-4 text-primary"><i class="fa fa-bullseye me-2"></i>Tujuan Aplikasi</h5>
                <ul>
                    <li>Mempermudah pengajuan peminjaman fasilitas secara online.</li>
                    <li>Memantau status pengajuan dan persetujuan dengan cepat.</li>
                    <li>Memberikan sistem administrasi yang lebih transparan di tingkat desa.</li>
                </ul>

                <h5 class="mt-4 text-primary"><i class="fa fa-book-open me-2"></i>Alur Penggunaan</h5>
                <ol>
                    <li>Buka menu <strong>Formulir Peminjaman</strong>.</li>
                    <li>Isi data fasilitas yang ingin dipinjam.</li>
                    <li>Unggah dokumen pendukung jika diperlukan.</li>
                    <li>Kirim pengajuan dan tunggu konfirmasi dari pihak desa.</li>
                </ol>


                
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
