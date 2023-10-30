<?php

namespace App\Models;

use App\Models\Absensi;
use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
    public function absensi(): HasMany
    {
        return $this->hasMany(Absensi::class);
    }
}
