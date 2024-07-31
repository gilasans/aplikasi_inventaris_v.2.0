<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    public $timestamps = false;
    public function barang() {
        return $this->hasMany(Barang::class,'supplier_id','id');
    }

    public function barangmasuk() {
        return $this->hasMany(Barangmasuk::class,'supplier_id','id');
    }

}
