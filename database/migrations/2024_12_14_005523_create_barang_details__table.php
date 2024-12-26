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
        Schema::create('barang_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->references('id')->on('barangs')->onDelete('cascade'); // Foreign Key ke tabel barang
            $table->date('tanggal_barang');
            $table->string('colis');
            $table->string('jenis_barang');
            $table->string('pengirim');
            $table->decimal('panjang', 10, 2);
            $table->decimal('lebar', 10, 2);
            $table->decimal('tinggi', 10, 2);
            $table->integer('total_barang');
            $table->decimal('m3', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_details');
    }
};
