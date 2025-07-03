<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KabupatenKota extends Model
{
    protected $table = 'kabupaten_kota';

    protected $primaryKey = 'kode_kab_kota';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_kab_kota',
        'kab_kota',
        'kode_provinsi',
        'is_ibu_kota',
        'aktif',
    ];

    /**
     * Relasi ke model Provinsi (via kolom kode_provinsi → kode)
     */
    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class, 'kode_provinsi', 'kode');
    }
}
