@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Daftar Harga Lapangan</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <button class="btn btn-primary mb-3" id="btnAddPrice" data-store-url="{{ route('field-prices.store') }}">
        + Tambah Harga
    </button>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Lapangan</th>
                <th>Jenis Lapangan</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prices as $price)
                <tr>
                    <td>{{ $price->field->nama_lapangan }}</td>
                    <td>{{ $price->field->jenis }}</td>
                    <td>{{ $price->jam_mulai }}</td>
                    <td>{{ $price->jam_selesai }}</td>
                    <td>Rp{{ number_format($price->harga) }}</td>
                    <td>
                        <button
                            type="button"
                            class="btn btn-sm btn-primary btn-edit-price"
                            data-price='@json($price)'>
                            <i class="mdi mdi-pencil"></i>
                        </button>
                        <form action="{{ route('field-prices.destroy', $price->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus harga ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Modal Tambah/Edit -->
    <div class="modal fade" id="priceModal" tabindex="-1" aria-labelledby="priceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <form id="priceForm" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="priceModalLabel">Tambah Harga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    
                <div class="mb-3">
                    <label for="field_id" class="form-label">Lapangan</label>
                    <select class="form-select" name="field_id" id="field_id" required>
                        @foreach($fields as $field)
                            <option value="{{ $field->id }}">{{ $field->nama_lapangan}}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="mb-3">
                    <label for="jam_mulai" class="form-label">Jam Mulai</label>
                    <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required>
                </div>
    
                <div class="mb-3">
                    <label for="jam_selesai" class="form-label">Jam Selesai</label>
                    <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" required>
                </div>
    
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" required>
                </div>
    
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
