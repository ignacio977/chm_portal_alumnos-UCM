<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practicasprofesionale extends Model
{
    protected $fillable = [
        'id', 'EmpresaId', 'DiasDesde',
        'DiasHasta', 'Actividad1', 'Actividad2',
        'Actividad3', 'Actividad4', 'PuestoOfrecido',
        'Enfoque', 'Estado'
    ];

    public function PostulacionPractica(){
        return $this->hasMany(PostulacionPractica::class, 'id', 'practicaid');
      }
}
