<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Kondisi;
use App\Models\Supplier;
use App\Models\Lokasi;
class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    public $timestamps = false;


    public function kategori() {
        return $this->belongsTo(Kategori::class,'kategori_id','id');
    }
    public function kondisi() {
        return $this->belongsTo(Kondisi::class,'kondisi_id','id');
    }
    public function supplier() {
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
    public function lokasi() {
        return $this->belongsTo(Lokasi::class,'lokasi_id','id');
    }
}
