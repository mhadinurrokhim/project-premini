<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class gaji extends Model
{
    use HasFactory;
    protected $fillable=[
        'nip',
        'gaji',
        'tanggal_pembayaran',
    ];
    public function Pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
