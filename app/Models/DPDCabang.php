<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DPDCabang extends Model
{
    use HasFactory;
    protected $table = 'dpd_cabang';
    protected $fillable = ['kode_provinsi','kab_kota','alamat','nama_ketua','nama_sekretaris','nama_bendahara'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'kode_provinsi', 'kode');
    }
}
