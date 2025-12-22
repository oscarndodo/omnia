<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'grupo_id',
        'titulo',
        'data',
        'descricao',
        'local',
        'tipo',
        'inicio',
        'termino',
        'status',
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function ofertas() {
        return $this->hasMany(Oferta::class);
    }
    public function visitas() {
        return $this->hasMany(Visita::class);
    }

    public function presenca() {
        return $this->hasMany(Presenca::class);
    }
}
