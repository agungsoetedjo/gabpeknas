<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GaleriDetail extends Model
{
    use HasFactory;

    protected $table = 'galeri_detail';

    protected $fillable = [
        'galeri_id',
        'file',
        'keterangan',
    ];

    public function galeri()
    {
        return $this->belongsTo(Galeri::class);
    }
}