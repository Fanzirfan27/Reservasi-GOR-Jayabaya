<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lapangan',
        'jenis',
        'deskripsi',
        'lokasi',
        'foto'
    ];
    public function hargaJam(){
        return $this->hasMany(FieldPrice::class);
    }
    // di app/Models/Field.php
public function prices()
{
    return $this->hasMany(FieldPrice::class, 'field_id');
}
public function bookings()
{
    return $this->hasMany(Booking::class);
}
}