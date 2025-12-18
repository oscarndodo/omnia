<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'genero',
        'telefone',
        'profissao',
        'endereco',
        'data_nascimento',
        'data_aceitacao',
        'data_batismo',
        'data_casamento',
        'estado_civil',
        'nome_pai',
        'nome_mae',
        'batizado',
        'dizimista',
        'estado',
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}
