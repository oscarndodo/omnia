<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Congregacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector_id',
        'nome',
        'lider',
        'tipo_obra',
        'proprietario',
        'fundacao',
        'endereco',
        'sede',
        'status',
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }
}
