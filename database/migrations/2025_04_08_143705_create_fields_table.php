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
        Schema::create('fields', function (Blueprint $table) {
                $table->id();
                $table->string('nama_lapangan');
                $table->enum('jenis', ['futsal', 'basket', 'voli']);
                $table->text('deskripsi')->nullable();
                $table->string('lokasi')->nullable();
                $table->string('foto')->nullable();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
