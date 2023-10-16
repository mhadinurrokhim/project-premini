<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->string('nama');
            $table->string('foto');
            $table->string('id_pegawai');
            $table->string('jabatan');
            $table->decimal('gaji', 10, 2);
            $table->string('alamat');
            $table->string('no_tlp');
            $table->text('informasi_pribadi');
            $table->text('informasi_pendidikan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
