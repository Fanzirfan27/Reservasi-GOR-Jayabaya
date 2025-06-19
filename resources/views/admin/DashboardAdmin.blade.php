@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> Dashboard
        </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
      </div>
      <div class="row">
        <!-- Total Reservasi Hari Ini -->
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-primary card-img-holder text-white">
            <div class="card-body">
              <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">
                Reservasi Hari Ini
                <i class="mdi mdi-calendar-check mdi-24px float-end"></i>
              </h4>
              <h2 class="mb-5">{{ $reservasiHariIni }}</h2>
              <h6 class="card-text">Data update real-time</h6>
            </div>
          </div>
        </div>
      
        <!-- Total Pendapatan Bulan Ini -->
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
              <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">
                Pendapatan Bulan Ini
                <i class="mdi mdi-currency-usd mdi-24px float-end"></i>
              </h4>
              <h2 class="mb-5">Rp {{ number_format($pendapatanBulanIni, 0, ',', '.') }}</h2>
              <h6 class="card-text">
                {{ $persentase > 0 ? 'Naik' : 'Turun' }} {{ abs(round($persentase)) }}% dari bulan lalu
              </h6>
            </div>
          </div>
        </div>
      
        <!-- Reservasi Akan Datang -->
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-warning card-img-holder text-white">
            <div class="card-body">
              <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">
                Reservasi Mendatang
                <i class="mdi mdi-clock-outline mdi-24px float-end"></i>
              </h4>
              <h2 class="mb-5">{{ $reservasiBesok }}</h2>
              <h6 class="card-text">Jumlah reservasi besok</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Statistik Reservasi Mingguan</h4>
              <canvas id="visit-reservation-weekly" height="100"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Pendapatan Per Bulan</h4>
              <canvas id="pendapatan_perbulan_chart" height="100"></canvas>
            </div>
          </div>
        </div>        
      </div>
      
      <script>
    const dataReservasiMingguan = @json($mingguan);
    const dataPendapatanBulanan = @json($pendapatanBulanan);
</script>

@endsection
