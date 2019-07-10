<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\PracticasProfesionale;

class PostulacionesPractica extends Model
{
    protected $fillable = [
        'id', 'alumnoid', 'practicaid',
        'fecha', 'estado', 'inspeccionado'
    ];

    public function practica(){
        return $this->belongsTo(PracticasProfesionale::class, 'practicaid', 'id');
    }
    public function encurso(){
        return $this->hasMany(EnCursoPractica::class, 'postulacionid', 'id');
    }
    public function alumno(){
        return $this->belongsTo(User::class, 'alumnoid', 'id');
    }
    public function respuesta(){
        return $this->hasMany(Respuesta::class, 'postulacionid', 'id');
    }
    public function comentario(){
        return $this->hasMany(Comentario::class, 'postulacionid', 'id');
    }

}
