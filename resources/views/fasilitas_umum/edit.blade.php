<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Fasilitas - DesaKu</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3 class="text-center text-primary mb-4">Edit Data Fasilitas</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fasilitas.update', $fasilitas->fasilitas_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama </label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $fasilitas->nama) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Fasilitas</label>
            <select name="jenis" class="form-select" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="Aula" {{ $fasilitas->jenis == 'Aula' ? 'selected' : '' }}>Aula</option>
                <option value="Lapangan" {{ $fasilitas->jenis == 'Lapangan' ? 'selected' : '' }}>Lapangan</option>
                <option value="Perpustakaan" {{ $fasilitas->jenis == 'Perpustakaan' ? 'selected' : '' }}>Perpustakaan</option>
                <option value="Balai Desa" {{ $fasilitas->jenis == 'Balai Desa' ? 'selected' : '' }}>Balai Desa</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat Fasilitas</label>
            <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $fasilitas->alamat) }}" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">RT</label>
                <input type="text" name="rt" class="form-control" value="{{ old('rt', $fasilitas->rt) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">RW</label>
                <input type="text" name="rw" class="form-control" value="{{ old('rw', $fasilitas->rw) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Kapasitas (Orang)</label>
            <input type="number" name="kapasitas" class="form-control" value="{{ old('kapasitas', $fasilitas->kapasitas) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi Fasilitas</label>
            <textarea name="deskripsi" class="form-control" rows="3" required>{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Foto / SOP Fasilitas</label>
            <input type="file" name="media" class="form-control" accept="image/*,application/pdf">
            @if($fasilitas->media)
                <small class="text-muted">File saat ini: <a href="{{ asset('storage/'.$fasilitas->media) }}" target="_blank">Lihat</a></small>
            @endif
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save me-2"></i>Simpan Perubahan</button>
            <a href="{{ route('fasilitas.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left me-2"></i>Kembali</a>
        </div>
    </form>
</div>
</body>
</html>
