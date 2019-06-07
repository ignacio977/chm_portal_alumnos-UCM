<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
     protected $table='reserva';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
    'id',
    'id_user',
    'id_sala',
    'bloque',
    'fecha_ingreso',
    'fecha_salida'
    ];
}
