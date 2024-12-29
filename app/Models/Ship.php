<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kapal', 'tipe_kapal'];

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
