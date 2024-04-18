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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('proyek_id')->constrained('proyeks')->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->restrictOnUpdate()->restrictOnDelete(); // Bisa kosong karena sifat task untuk diambil, bukan diberikan.
            $table->string('task');
            $table->enum('status', ['0', '1', '2'])->nullable(); // [Pengerjaan, Menunggu Review, Selesai]
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
