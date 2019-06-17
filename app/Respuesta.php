<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable = [
        'id', 'alumnoid', 
        'preguntaid', 'NivelDeConformidad',
        'created_at', 'updated_at',
    ];

    // public function RespuestaPregunta(){
    //     return $this->hasMany(Respuestas::class, 'id', 'preguntaid');
    // }
}
