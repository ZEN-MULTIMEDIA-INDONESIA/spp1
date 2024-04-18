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
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('user_id')->constrained('users')->restrictOnUpdate()->restrictOnDelete();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('jenis_proyek');
            $table->date('tanggal_mulai');
            $table->date('tanggal_tenggat');
            $table->string('foto_uang_muka')->nullable();
            $table->double('uang_muka')->nullable();
            $table->double('biaya')->nullable();
            $table->enum('status', ['0', '1', '2', '3'])->default('0'); // [Menunggu Konfirmasi, Di Proses, Review, Selesai]
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyeks');
    }
};
