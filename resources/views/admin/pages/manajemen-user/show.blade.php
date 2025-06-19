@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail User</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
            <p><strong>Telepon:</strong> {{ $user->no_telp ?? 'Tidak ada' }}</p>
            <p><strong>Alamat:</strong> {{ $user->alamat ?? 'Tidak ada' }}</p>
            <p><strong>Dibuat Pada:</strong> {{ $user->created_at->format('d M Y H:i') }}</p>
            <p><strong>Terakhir Diupdate:</strong> {{ $user->updated_at->format('d M Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">
        <i class="mdi mdi-arrow-left"></i> Kembali</a>
</div>
@endsection
