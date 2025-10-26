<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Data Fasilitas - DesaKu</title>
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
                    <a href="{{ url('/fasilitas/tampilan') }}" class="nav-item nav-link active">
                        <i class="fa fa-list me-2"></i>Data Fasilitas
                    </a>
                </div>
            </nav>
        </div>

        <!-- Content -->
        <div class="content flex-grow-1 p-4">
            <h3 class="text-center text-primary mb-4">Daftar Fasilitas Umum</h3>

            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            @if($fasilitas->isEmpty())
                <div class="alert alert-info text-center">Belum ada data fasilitas.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama </th>
                                <th>Jenis</th>
                                <th>Alamat</th>
                                <th>RT/RW</th>
                                <th>Kapasitas</th>
                                <th>Deskripsi</th>
                                <th>Media</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fasilitas as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jenis }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->rt }}/{{ $item->rw }}</td>
                                    <td>{{ $item->kapasitas }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>
                                        @if($item->media)
                                            <a href="{{ asset('storage/'.$item->media) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat File</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/fasilitas/'.$item->fasilitas_id.'/edit') }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                                        <form action="{{ url('/fasilitas/'.$item->fasilitas_id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
