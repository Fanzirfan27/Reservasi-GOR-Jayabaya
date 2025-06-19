
@extends('admin.layouts.app') {{-- Ganti dengan layout yang kamu pakai --}}

@section('content')
<div class="container">
    <h2 class="mb-4">Manajemen Data User</h2>

    @if (session('success'))
      <div class="p-2 text-green-600">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-info">
                        <i class="mdi mdi-eye"></i>
                    </a>
                    <button class="btn btn-sm btn-primary" onclick="openEditModal({{ $user->id }}, '{{ $user->role }}')">
                                <i class="mdi mdi-pencil"></i>
                    </button>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus user ini?')" class="btn btn-sm btn-danger">
                            <i class="mdi mdi-delete"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
        function openEditModal(userId, currentRole) {
            var url = '/admin/users/' + userId ;
            $('#editForm').attr('action', url);
            $('#role').val(currentRole.toLowerCase());
            $('#editModal').modal('show');
        }

    </script>
@endsection
