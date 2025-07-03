<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaBujk extends Model
{
    use HasFactory;
    protected $table = 'anggota_bujk';
    protected $fillable = ['nama_bujk','kualifikasi','nomor_kta','kode_provinsi','kode_kab_kota','tgl_pembuatan','tgl_berakhir'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'kode_provinsi', 'kode');
    }

    public function kabupatenKota()
    {
        return $this->belongsTo(KabupatenKota::class, 'kode_kab_kota', 'kode_kab_kota');
    }
}
