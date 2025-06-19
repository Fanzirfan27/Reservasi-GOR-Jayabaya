<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPendapatan extends Model
{
    protected $table = 'laporan_pendapatan';

    protected $fillable = [
        'booking_id',
        'tanggal_laporan',
        'nama_pemesan',
        'nama_lapangan',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'harga_booking',
        'status_pembayaran'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
