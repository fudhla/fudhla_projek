<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bina Desa - Guest</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-4">
    <h1 class="text-center text-success mb-4">🌿 Bina Desa</h1>
    <h3 class="text-center mb-5">Selamat Datang, Tamu Desa</h3>

    <p class="text-center">Berikut adalah informasi fasilitas desa yang dapat digunakan masyarakat:</p>

    <div class="row">
      @foreach($fasilitas as $item)
        <div class="col-md-6 mb-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title text-success">{{ $item['nama'] }}</h5>
              <p><b>Jenis:</b> {{ $item['jenis'] }}</p>
              <p><b>Kapasitas:</b> {{ $item['kapasitas'] }} orang</p>
              <p><b>Deskripsi:</b> {{ $item['deskripsi'] }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="text-center mt-5">
      <a href="/" class="btn btn-outline-success">Kembali ke Halaman Utama</a>
    </div>
  </div>

</body>
</html>
