@extends('admin.layouts.app')

@section('content')
    <h2>Manajemen Pembayaran</h2>

    @if(session('success')) <div>{{ session('success') }}</div> @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID Booking</th>
                <th>Nama User</th>
                <th>Tanggal Main</th>
                <th>Total Bayar</th>
                <th>Status Pembayaran</th>
                <th>Bukti Struk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->booking->id }}</td>
                    <td>{{ $payment->booking->user->name }}</td>
                    <td>{{ $payment->booking->tanggal }}</td>
                    <td>Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($payment->status) }}</td>
                    <td>
                        @if ($payment->bukti_struk)
                            <a href="{{ asset('storage/' . $payment->bukti_struk) }}" target="_blank" class="text-blue-600 hover:underline">
                                Lihat Struk
                            </a>
                        @else
                            <span class="text-gray-500">Belum diunggah</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()" class="border rounded p-1 text-sm">
                                <option disabled selected>Pilih Aksi</option>
                                <option value="done">✔ Terima (Done)</option>
                                <option value="rejected">✖ Tolak (Rejected)</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
