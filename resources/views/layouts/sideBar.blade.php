<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <i class="ni ni-tv-2 text-primary fa-3x"></i>
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/home">
                            <i class="fas fa-tachometer-alt text-blue"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sumber.pemasukan') }}">
                            <i class="ni ni-credit-card"></i>
                            <span class="nav-link-text">Managemen Sumber</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage.pemasukan') }}">
                            <i class="ni ni-credit-card"></i>
                            <span class="nav-link-text">Manage Pemasukan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pengeluaran.index') }}">
                            <i class="ni ni-credit-card"></i>
                            <span class="nav-link-text">Manage Pengeluaran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('laporan.index') }}">
                            <i class="fas fa-file-export"></i>
                            <span class="nav-link-text">Laporan Keuangan</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
