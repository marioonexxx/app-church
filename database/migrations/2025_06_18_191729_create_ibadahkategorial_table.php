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
        Schema::create('ibadahkategorial', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->date('waktu')->nullable();
            $table->string('jam')->nullable();
            $table->string('tempat')->nullable();
            $table->string('pemimpin')->nullable();
            $table->string('kategori')->nullable();
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
        Schema::dropIfExists('ibadahkategorial');
    }
};
