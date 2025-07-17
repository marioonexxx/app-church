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
        Schema::create('jemaat', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable(); // Nama anggota jemaat
            $table->string('nama_kepala_keluarga')->nullable(); // Untuk group by KK
            $table->string('status_dalam_keluarga')->nullable(); // Kepala/Istri/Anak
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('kelamin', ['L', 'P'])->nullable(); // Laki-laki / Perempuan
            $table->string('sektor')->nullable();
            $table->string('unit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jemaat');
    }
};
