<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulasiKategori extends Model
{
    use HasFactory;

    protected $table = 'regulasi_kategori';

    protected $fillable = [
        'nama',
        'deskripsi',
        'aktif',
    ];

    public function regulasi()
    {
        return $this->hasMany(Regulasi::class, 'regulasi_kategori_id');
    }
}
