<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presenca extends Model
{
    use HasFactory;

    protected $fillable = [
        "evento_id",
        "crente_id",
        "status"
    ];

    public function evento() {
        return $this->belongsTo(Evento::class);
    }
}
