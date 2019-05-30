<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\PracticasProfesionale;

class PostulacionesPractica extends Model
{
    protected $fillable = [
        'id', 'alumnoid', 'practicaid',
        'fecha', 'Estado'
    ];

    public function practica(){
        return $this->belongsTo(PracticasProfesionale::class, 'practicaid', 'id');
      }
    public function alumno(){
    return $this->belongsTo(User::class, 'alumnoid', 'id');
    }

}
