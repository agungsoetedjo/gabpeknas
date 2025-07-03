<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $table = 'pesan';
    protected $fillable = ['nama_depan', 'nama_belakang', 'no_telp', 'email', 'message', 'kategori'];
}
