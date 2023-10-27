<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable=[
        'nama',
        'foto',
        'id_pegawai',
        'id_jabatan',
        'gaji',
        'alamat',
        'no_tlp'
    ];
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
    public function absensi()
    {
        return $this->belongsTo(Absensi::class, 'id_pegawai');
    }
}
