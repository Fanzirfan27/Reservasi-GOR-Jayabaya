@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Booking</h1>

        <table class="table table-bordered" id="bookingTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Jenis</th>
                    <th>Lapangan</th>
                    <th>Tanggal</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->field->jenis }}</td>
                        <td>{{ $booking->field->nama_lapangan }}</td>
                        <td>{{ $booking->tanggal }}</td>
                        <td>{{ $booking->jam_mulai }}</td>
                        <td>{{ $booking->jam_selesai }}</td>
                        <td>{{ $booking->harga_booking }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" onclick="openEditModal({{ $booking->id }}, '{{ $booking->status }}')">
                                <i class="mdi mdi-pencil"></i>
                            </button>
                            <form method="POST" action="{{ route('admin.bookings.destroy', $booking->id) }}" class="form-delete d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger btn-delete" data-id="{{ $booking->id }}">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Status Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" action="">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="done">Done</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openEditModal(bookingId, currentStatus) {
            var url = '/admin/bookings/' + bookingId;
            $('#editForm').attr('action', url);
            $('#status').val(currentStatus.toLowerCase());
            $('#editModal').modal('show');
        }
    $(document).ready(function () {
        $('#bookingTable').DataTable({
            responsive: true,
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50, 100],
            language: {
                lengthMenu: " _MENU_ data",
                zeroRecords: "Data tidak ditemukan",
                info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                infoEmpty: "Data kosong",
                infoFiltered: "(difilter dari total _MAX_ data)",
                search: "Cari:",
                paginate: {
                    next: ">",
                    previous: "<"
                }
            }
        });
    });

    </script>
@endsection
