<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard BinaDesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);
            min-height: 100vh;
        }

        .welcome-alert {
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            background: white;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0,0,0,0.15);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.25);
        }

        .card-header {
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            border-radius: 15px 15px 0 0;
        }

        .card-body .bi {
            font-size: 2rem;
            color: #4facfe;
        }

        .dashboard-section {
            margin-top: 2rem;
        }

        .btn-action {
            background: #4facfe;
            color: white;
            border-radius: 10px;
            padding: 0.5rem 1rem;
            transition: all 0.3s;
        }

        .btn-action:hover {
            background: #00f2fe;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <!-- Welcome Alert -->
        <div class="welcome-alert text-center">
            <h2>🎉 Selamat Datang di Dashboard BinaDesa 🎉</h2>
            <p>Login berhasil, semoga harimu menyenangkan!</p>
        </div>

        <!-- Dashboard Stats -->
        <div class="row dashboard-section">
            <div class="col-md-4 mb-4">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-people-fill me-3"></i>
                        <div>
                            <h5>Pengguna Aktif</h5>
                            <h3>1,245</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-file-earmark-text-fill me-3"></i>
                        <div>
                            <h5>Dokumen Tersedia</h5>
                            <h3>578</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-3"></i>
                        <div>
                            <h5>Tugas Selesai</h5>
                            <h3>1,032</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="row dashboard-section text-center">
            <div class="col-md-4 mb-3">
                <button class="btn btn-action w-100"><i class="bi bi-plus-circle me-2"></i> Tambah Data</button>
            </div>
            <div class="col-md-4 mb-3">
                <button class="btn btn-action w-100"><i class="bi bi-search me-2"></i> Cari Data</button>
            </div>
            <div class="col-md-4 mb-3">
                <button class="btn btn-action w-100"><i class="bi bi-bar-chart-line me-2"></i> Lihat Laporan</button>
            </div>
        </div>

        <!-- Additional Cards / Info Section -->
        <div class="row dashboard-section">
            <div class="col-md-6 mb-4">
                <div class="card p-3">
                    <div class="card-header">Notifikasi Terbaru</div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li>📌 Data desa baru ditambahkan</li>
                            <li>📌 Pengguna baru mendaftar</li>
                            <li>📌 Sistem backup berhasil</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card p-3">
                    <div class="card-header">Tips & Panduan</div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li>💡 Gunakan fitur pencarian untuk menemukan data cepat</li>
                            <li>💡 Selalu periksa notifikasi terbaru</li>
                            <li>💡 Backup data secara berkala</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
