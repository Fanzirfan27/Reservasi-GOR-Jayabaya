<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_bookings_table.php

public function up(): void
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('field_id')->constrained('fields')->onDelete('cascade');
        $table->date('tanggal');
        $table->time('jam_mulai');
        $table->time('jam_selesai');
        $table->string('nama_kontak', 100);
        $table->string('no_hp_kontak', 20);
        $table->text('alamat_kontak');
        $table->enum('status', ['pending', 'disetujui', 'ditolak', 'dibatalkan'])->default('pending');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
