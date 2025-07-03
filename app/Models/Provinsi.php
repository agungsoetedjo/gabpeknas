<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $table = 'provinsi';
    protected $fillable = ['kode','nama','nama_singkat','nama_lain','kode_provinsi_lama','aktif'];

    public function anggotaBujk()
    {
        return $this->hasMany(AnggotaBujk::class, 'kode_provinsi', 'kode');
    }

    public function dpdCabang()
    {
        return $this->hasMany(DPDCabang::class, 'kode_provinsi', 'kode');
    }

    public function kabupatenKota()
    {
        return $this->hasMany(KabupatenKota::class, 'kode_provinsi', 'kode');
    }

    public function berita()
    {
        return $this->hasMany(Berita::class, 'kode_provinsi', 'kode');
    }
}
