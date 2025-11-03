<nav class="navbar navbar-expand-lg navbar-light py-3">
    <div class="container">
        <a class="navbar-brand fw-bold text-success" href="{{ route('fasilitas.index') }}">Binsa Desa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGuest">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarGuest">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('fasilitas.index') }}">Fasilitas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Peminjaman</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
            </ul>
        </div>
    </div>
</nav>
