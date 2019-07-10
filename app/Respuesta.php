<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pregunta;

class Respuesta extends Model
{
    protected $fillable = [
        'id', 'alumnoid', 'preguntaid',
        'postulacionid', 'NivelDeConformidad',
        'created_at', 'updated_at',
    ];

    public function RespuestaPregunta(){
        return $this->belongsTo(Pregunta::class, 'preguntaid', 'id');
    }
    public function RespuestaUsuario(){
        return $this->belongsTo(User::class, 'alumnoid', 'id');
    }
    public function RespuestaPostulacion(){
        return $this->belongsTo(PostulacionesPractica::class, 'postulacionid', 'id');
    }
}
