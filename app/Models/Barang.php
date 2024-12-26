<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_merk',
        'kapal',
        'tujuan',
        'tanggal',
        'biaya_ekspedisi',
        'biaya_lain',
        'total_pembayaran',
        'dp_pertama',
        'sisa_pembayaran',
        'terbilang',
    ];

    public function details()
    {
        return $this->hasMany(DetailBarang::class);
    }
}
