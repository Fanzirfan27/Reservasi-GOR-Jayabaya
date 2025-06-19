<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src={{ asset('assets/images/faces/face1.jpg') }} alt="profile" />
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
            <span class="text-secondary text-small">Admin Manager</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/dashboard/admin') }}">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      {{-- Reservasi --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.bookings.index') }}">
          <span class="menu-title">Data Reservasi</span>
          <i class="mdi mdi-calendar-clock menu-icon"></i>
        </a>
      </li>

      {{-- Lapangan --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#lapangan" aria-expanded="false" aria-controls="lapangan">
          <span class="menu-title">Kelola Lapangan</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-soccer menu-icon"></i>
        </a>
        <div class="collapse" id="lapangan">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('fields.index') }}">Daftar Lapangan
                <i class="mdi mdi-soccer-field menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('field-prices.index') }}">
                <span class="menu-title">Kelola Harga</span>
                <i class="mdi mdi-currency-usd menu-icon"></i>
              </a>
            </li>
          </ul>
        </div>
      </li>
      {{-- Pengguna --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
          <span class="menu-title">Data Pengguna</span>
          <i class="mdi mdi-account-multiple menu-icon"></i>
        </a>
      </li>
      {{-- Pembayaran --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.payments.index') }}">
          <span class="menu-title">Pembayaran</span>
          <i class="mdi mdi-cash-multiple menu-icon"></i>
        </a>
      </li>

      {{-- Laporan --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('laporan.index') }}">
          <span class="menu-title">Laporan</span>
          <i class="mdi mdi-file-chart menu-icon"></i>
        </a>
      </li>

      {{-- Logout --}}
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <span class="menu-title">Logout</span>
          <i class="mdi mdi-logout menu-icon"></i>
        </a>
        <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
          @csrf
        </form>
      </li>
      
    </ul>
</nav>
      
