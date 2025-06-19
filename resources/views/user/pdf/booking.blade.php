<!DOCTYPE html>
<html>
<head>
    <title>Bukti Booking</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f4f4f4;
            margin: 0;
            padding: 30px;
        }
        .receipt-container {
            background: #fff;
            width: 400px;
            margin: auto;
            padding: 20px 30px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .receipt-title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .receipt-subtitle {
            text-align: center;
            font-size: 12px;
            margin-bottom: 20px;
        }
        .line {
            border-bottom: 1px dashed #000;
            margin: 10px 0;
        }
        .label {
            display: inline-block;
            width: 130px;
            font-weight: bold;
        }
        .row {
            margin-bottom: 6px;
        }
        .thank-you {
            text-align: center;
            margin-top: 30px;
            font-style: italic;
        }
        .status {
            padding: 5px 10px;
            border-radius: 4px;
            display: inline-block;
        }
        .status.diterima {
            background-color: #d4edda;
            color: #155724;
        }
        .status.pending {
            background-color: #fff3cd;
            color: #856404;
        }
        .status.ditolak {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="receipt-title">BUKTI RESERVASI</div>
        <div class="receipt-subtitle">GOR Lapangan Jayabaya </div>
        <div class="line"></div>

        <div class="row"><span class="label">Nama Pemesan</span>: {{ $booking->user->name }}</div>
        <div class="row"><span class="label">Nama Lapangan</span>: {{ $booking->field->nama_lapangan }}</div>
        <div class="row"><span class="label">Jenis</span>: {{ $booking->field->jenis }}</div>
        <div class="row"><span class="label">Tanggal</span>: {{ $booking->tanggal }}</div>
        <div class="row"><span class="label">Jam</span>: {{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</div>
        <div class="row"><span class="label">Harga</span>: Rp {{ number_format($booking->harga_booking) }}</div>
        <div class="row">
            <span class="label">Status</span>: 
            <span class="status {{ strtolower($booking->status) }}">{{ ucfirst($booking->status) }}</span>
        </div>

        @if($booking->payment)
            <div class="row">
                <span class="label">Pembayaran</span>: 
                <span class="status {{ strtolower($booking->payment->status) }}">{{ ucfirst($booking->payment->status) }}</span>
            </div>
        @endif

        <div class="line"></div>
        <div class="thank-you">Terima kasih telah menggunakan layanan kami!</div>
    </div>
</body>
</html>
