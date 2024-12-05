<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',           // Kolom NIM
        'nama',          // Kolom Nama
        'jurusan',       // Kolom Jurusan
        'tanggal_lahir', // Kolom Tanggal Lahir
        'tempat_lahir',  // Kolom Tempat Lahir
        'no_telp',       // Kolom No Telepon
        'foto',          // Kolom Foto
    ];
}
