<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'booking_id',
        'bukti_struk',
        'jumlah',
        'status'
    ];

    public $timestamps = true;

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
