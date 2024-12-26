<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBarang extends Model
{
    use HasFactory;

    protected $table = 'barang_details';

    protected $fillable = [
        'barang_id',
        'tanggal_barang',
        'colis',
        'jenis_barang',
        'pengirim',
        'panjang',
        'lebar',
        'tinggi',
        'total_barang',
        'm3',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }   
}
