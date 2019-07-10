<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnCursoPractica extends Model
{
    protected $fillable = [
        'id', 'alumnoid', 'practicaid','postulacionid',
        'fecha', 'nota1', 'nota2',
        'nota3', 'created_at', 'updated_at',
    ];

    public function postulacion(){
        return $this->belongsTo(PostulacionesPractica::class, 'postulacionid', 'id');
    }
    public function alumno(){
        return $this->belongsTo(User::class, 'alumnoid', 'id');
    }
    public function practica(){
        return $this->belongsTo(PracticasProfesionale::class, 'practicaid', 'id');
    }
}
