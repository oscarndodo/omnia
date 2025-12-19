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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('congregacao_id')->constrained('congregacaos')->cascadeOnDelete();
            $table->string('nome');
            $table->string('endereco')->nullable();
            $table->string('lider')->nullable();
            $table->string('secretario')->nullable();
            $table->string('tesoureiro')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
