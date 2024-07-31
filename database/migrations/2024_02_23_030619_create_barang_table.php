<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->string('spesifikasi');
            $table->bigInteger('jumlah');
            $table->string('image', 500);
            $table->unsignedBigInteger('lokasi_id');
            $table->unsignedBigInteger('kondisi_id');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('lokasi_id')->references('id')->on('lokasi');
            $table->foreign('kondisi_id')->references('id')->on('kondisi');
            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->foreign('supplier_id')->references('id')->on('supplier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
