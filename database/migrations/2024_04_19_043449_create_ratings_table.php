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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('proyek_id')->constrained('proyeks')->restrictOnUpdate()->restrictOnDelete();
            $table->integer('rate')->nullable();
            $table->text('text')->nullable();
            $table->enum('publish', ['0', '1'])->nullable(); // 0 => Tidak, 1 => Ya
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
