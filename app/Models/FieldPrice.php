<?php

namespace App\Models;

use App\Models\Field;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FieldPrice extends Model
{
    
    use HasFactory;
    protected $table = 'fields_prices';
    protected $fillable = ['field_id', 'jam_mulai', 'jam_selesai', 'harga'];

    public function field(){
        return $this->belongsTo(Field::class);
    }
    
}
