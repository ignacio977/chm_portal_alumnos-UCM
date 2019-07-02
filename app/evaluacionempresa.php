<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\PostulacionesPractica;

class evaluacionempresa extends Model
{
  protected $fillable = [
      'id', 'alumnoid', 'practicaid',
      'fecha', 'pregunta1', 'pregunta2',
      'pregunta3', 'pregunta4'
  ];

  public function practica(){
      return $this->belongsTo(PostulacionesPractica::class, 'id', 'practicaid',  'alumnoid');
  }
  public function alumno(){
      return $this->belongsTo(User::class, 'id', 'alumnoid');
  }
}
