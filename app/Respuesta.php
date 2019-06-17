<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pregunta;

class Respuesta extends Model
{
    protected $fillable = [
        'id', 'alumnoid', 
        'preguntaid', 'NivelDeConformidad',
        'created_at', 'updated_at',
    ];

    public function RespuestaPregunta(){
        return $this->belongsTo(Pregunta::class, 'preguntaid', 'id');
    }
}
