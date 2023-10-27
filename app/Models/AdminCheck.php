<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCheck extends Model
{
    use HasFactory;
    protected $fillable=[
        'nama',
        'tanggal',
        'hadir',
        'telat',
        'izin',
        'alfa'
    ];
}
