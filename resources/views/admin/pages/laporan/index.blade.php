@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4"><i class="bi bi-clipboard-data"></i> Laporan Pendapatan</h3>

    <form method="GET" action="{{ route('laporan.index') }}" class="row g-3 align-items-end mb-4">
        <div class="col-md-3">
            <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
            <input type="date" name="tanggal_awal" id="tanggal_awal" value="{{ request('tanggal_awal') }}" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" id="tanggal_akhir" value="{{ request('tanggal_akhir') }}" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
            <input type="text" name="nama_pemesan" id="nama_pemesan" value="{{ request('nama_pemesan') }}" class="form-control" placeholder="Nama Pemesan">
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-outline-primary w-100"><i class="mdi mdi-filter"></i></button>
            <a href="{{ route('laporan.generate') }}" class="btn btn-outline-success w-100"><i class="mdi mdi-gear"></i> Generate</a>
          </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered align-middle table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Lapangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporan as $row)
                <tr>
                    <td>{{ $row->nama_pemesan }}</td>
                    <td>{{ $row->nama_lapangan }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ $row->jam_mulai }} - {{ $row->jam_selesai }}</td>
                    <td>Rp {{ number_format($row->harga_booking, 0, ',', '.') }}</td>
                    <td>
                        @if ($row->status_pembayaran === 'Done')
                            <span class="badge bg-success"><i class="bi bi-check-circle"></i> Selesai</span>
                        @elseif ($row->status_pembayaran === 'Pending')
                            <span class="badge bg-warning text-dark"><i class="bi bi-clock"></i> Menunggu</span>
                        @else
                            <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Ditolak</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Tidak ada data laporan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
  <div class="d-flex justify-content-between align-items-center mt-4">
        <h4>Total Pendapatan: <span class="text-success">Rp {{ number_format($total, 0, ',', '.') }}</span></h4>

        <form action="{{ route('laporan.export') }}" method="GET" class="d-flex gap-2">
            <input type="hidden" name="tanggal_awal" value="{{ request('tanggal_awal') }}">
            <input type="hidden" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}">
            <input type="hidden" name="nama_pemesan" value="{{ request('nama_pemesan') }}">
            <button type="submit" class="btn btn-outline-warning">
                <i class="bi bi-file-earmark-excel"></i> Export Excel
            </button>
        </form>
    </div>
</div>
@endsection
