<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'congregacao_id',
        'nome',
        'lider',
        'secretario',
        'tesoureiro',
        'endereco',
        'estado',
    ];

    public function congregacao()
    {
        return $this->belongsTo(Congregacao::class);
    }

    public function crentes()
    {
        return $this->hasMany(Crente::class);
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
}
