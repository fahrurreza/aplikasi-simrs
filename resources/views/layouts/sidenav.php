<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
          <img src="assets/img/icons/logo.png" alt="MultiLogika" style="width:6rem;">
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{!! url('home') !!}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="student">
                <i class="ni ni-hat-3 text-orange"></i>
                <span class="nav-link-text">Siswa</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="registration">
                <i class="ni ni-money-coins text-green"></i>
                <span class="nav-link-text">Pendaftaran</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="study">
                <i class="ni ni-books text-primary"></i>
                <span class="nav-link-text">Jurusan</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="group">
                <i class="ni ni-building text-blue"></i>
                <span class="nav-link-text">Kelas</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{('transaction')}}">
                <i class="ni ni-hat-3 text-orange"></i>
                <span class="nav-link-text">Transaksi</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="user">
                <i class="ni ni-money-coins text-yellow"></i>
                <span class="nav-link-text">Pengguna</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
</nav>