<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = [
        'id', 'ContenidoPregunta', 
        'TipoPregunta', 'created_at', 
        'updated_at',
    ];

    // public function RespuestaPregunta(){
    //     return $this->hasMany(Respuestas::class, 'id', 'preguntaid');
    // }
}
