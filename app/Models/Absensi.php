<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable =[
        'id_nip',
        'tanggal',
        'keterangan'
    ];
    public function Pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'id_nip','id');
    }
}
