<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Pegawais')->insert([
            'id_pegawai'=> '7',
            'nama'=> 'ha',
            'tanggal_lahir'=> '2023-10-17',
            'departemen'=> 'enggaktaupaan',
            'jabatan'=> 'marketing',
            'gaji'=> '100.000',
        ]);
    }
}
