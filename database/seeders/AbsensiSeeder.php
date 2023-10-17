<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('absensis')->insert([
            'pegawai_id'=> '12',
            'tanggal'=> '2023-10-17',
            'keterangan'=> 'Masuk'
        ]);
        DB::table('absensis')->insert([
            'pegawai_id'=> '100',
            'tanggal'=> '2023-10-17',
            'keterangan'=> 'Masuk'
        ]);
        DB::table('absensis')->insert([
            'pegawai_id'=> '13',
            'tanggal'=> '2023-10-17',
            'keterangan'=> 'Masuk'
        ]);
    }
}
