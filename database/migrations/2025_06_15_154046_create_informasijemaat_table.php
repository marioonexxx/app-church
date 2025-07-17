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
        Schema::create('informasijemaat', function (Blueprint $table) {
            $table->id();
            $table->string('asal')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('judul')->nullable();
            $table->longText('konten')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasijemaat');
    }
};
