<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    protected $fillable = [
            "crente_id",
            "tipo",
            "valor"
    ];

    public function evento() {
        return $this->belongsTo(Evento::class);
    }
}
