<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ asset('argon/assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="/home">
                <i class="ni ni-tv-2 text-primary"></i>
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
              <a class="nav-link" href="examples/profile.html">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profile</span>
              </a>
            </li>
            
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
          </h6>
          <!-- Navigation -->
         
        </div>
      </div>
    </div>
  </nav>