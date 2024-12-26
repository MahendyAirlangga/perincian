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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_merk');
            $table->string('kapal');
            $table->string('tujuan');
            $table->date('tanggal');
            $table->decimal('biaya_ekspedisi', 10, 2);
            $table->decimal('biaya_lain', 10, 2)->nullable();
            $table->decimal('total_pembayaran', 10, 2);
            $table->decimal('dp_pertama', 10, 2)->nullable();
            $table->decimal('sisa_pembayaran', 10, 2);
            $table->string('terbilang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
