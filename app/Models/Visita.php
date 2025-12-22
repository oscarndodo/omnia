<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;

    protected $fillable = [
        "evento_id",
        "nome",
        "telefone",
        "idade",
        "descricao"
    ];

    public function evento() {
        return $this->belongsTo(Evento::class);
    }
}
