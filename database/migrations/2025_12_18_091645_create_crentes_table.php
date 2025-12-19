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
        Schema::create('crentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grupo_id')->nullable()->constrained('grupos')->cascadeOnDelete();
            $table->string('nome');
            $table->enum('genero', ['Masculino', 'Feminino'])->nullable();
            $table->string('telefone')->nullable();
            $table->string('profissao')->nullable();
            $table->string('endereco')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->date('data_aceitacao')->nullable();
            $table->date('data_batismo')->nullable();
            $table->date('data_casamento')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('nome_pai')->nullable();
            $table->string('nome_mae')->nullable();
            $table->boolean('batizado')->default(true);
            $table->boolean('dizimista')->default(false);
            $table->boolean('casado')->default(false);
            $table->enum('estado', ['Ativo', 'Inativo', 'Morto', 'Desviado'])->default('Ativo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crentes');
    }
};
