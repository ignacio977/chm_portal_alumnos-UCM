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

    public function practicasprofesionale(){
        return $this->hasMany(PracticasProfesionale::class, 'practicaid', 'id');
      }
    public function alumno(){
    return $this->hasMany(User::class, 'alumnoid', 'id');
    }

}
