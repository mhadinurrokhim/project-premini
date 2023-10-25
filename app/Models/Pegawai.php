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
        'jabatan',
        'gaji',
        'alamat',
        'no_tlp'
    ];
    public function konfirmasi()
    {
        return $this->hasMany(Konfirmasi::class, 'id_pegawai', 'id_pegawai');
    }
}
