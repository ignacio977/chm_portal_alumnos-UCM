<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Respuesta;

class Pregunta extends Model
{
    protected $fillable = [
        'id', 'ContenidoPregunta', 
        'TipoPregunta', 'created_at', 
        'updated_at',
    ];

    public function PreguntaRespuesta(){
        return $this->hasMany(Respuesta::class, 'id', 'preguntaid');
    }
}
