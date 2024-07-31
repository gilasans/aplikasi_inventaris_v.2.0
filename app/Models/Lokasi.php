<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'lokasi';
    public $timestamps = false;
    public function barang() {
        return $this->hasMany(Barang::class,'lokasi_id','id');
    }
}
