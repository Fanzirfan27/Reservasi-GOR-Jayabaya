<?php
// app/Models/Booking.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'field_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'nama_kontak',
        'no_hp_kontak',
        'alamat_kontak',
        'harga_booking',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id');
    }
    public function payment()
{
    return $this->hasOne(Payment::class);
}

}
