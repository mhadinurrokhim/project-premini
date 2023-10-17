<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable=[
        'nama',
        'image',
        'id_pegawai',
        'jabatan',
        'gaji',
        'alamat',
        'no_tlp',
        'aksi'
    ];
}
