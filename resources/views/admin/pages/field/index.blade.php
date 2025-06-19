@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Data Lapangan</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('fields.create') }}" class="btn btn-primary mb-3">+ Tambah Lapangan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fields as $field)
            <tr>
                <td>{{ $field->nama_lapangan }}</td>
                <td>{{ $field->jenis }}</td>
                <td>{{ $field->deskripsi }}</td>
                <td>
                    @if($field->foto)
                        <img src="{{ asset('uploads/lapangan/' . $field->foto) }}" width="100">
                    @else
                        Tidak ada foto
                    @endif
                </td>
                <td>
                    <a href="{{ route('fields.edit', $field->id) }}" class="btn btn-primary btn-sm">
                        <i class="mdi mdi-pencil"></i>
                    </a>
                    <form action="{{ route('fields.destroy', $field->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="mdi mdi-delete"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
