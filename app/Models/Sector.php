<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'lider',
        'status',
    ];

    public function congregacoes()
    {
        return $this->hasMany(Congregacao::class);
    }
}
