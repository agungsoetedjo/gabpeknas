<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulasi extends Model
{
    use HasFactory;

    protected $table = 'regulasi';

    protected $fillable = [
        'regulasi_kategori_id',
        'judul',
        'deskripsi',
        'file_dok',
        'aktif',
    ];

    public function kategori()
    {
        return $this->belongsTo(RegulasiKategori::class, 'regulasi_kategori_id');
    }
}
