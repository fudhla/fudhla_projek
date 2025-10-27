 {{-- SIDEBAR --}}
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="#" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-home me-2"></i>DesaKu</h3>

                </a>
                <div class="navbar-nav w-100">
                    <!-- Link menuju tampilan semua data fasilitas -->
                    <a href="{{ route('fasilitas.tampilan') }}" class="nav-item nav-link">
                        <i class="fa fa-building me-2"></i>Lihat Semua Fasilitas
                    </a>

                    <!-- Link ke halaman form peminjaman -->
                    <a href="{{ route('fasilitas.create') }}" class="nav-item nav-link active">
                        <i class="fa fa-calendar-check me-2"></i>Formulir Peminjaman
                    </a>
                    <a href="{{ url('/about') }}" class="nav-item nav-link">
    <i class="fa fa-info-circle me-2"></i>Tentang
</a>

                </div>
            </nav>
        </div>
{{-- END SIDEBAR --}}
