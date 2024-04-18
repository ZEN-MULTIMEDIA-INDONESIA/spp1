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
        Schema::create('catatans', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('task_id')->constrained('tasks')->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('user_id')->constrained('users')->restrictOnUpdate()->restrictOnDelete(); // Yang memberikan catatan merupakan user dengan peran 0 / PM
            $table->text('catatan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatans');
    }
};
