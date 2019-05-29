<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class practicasprofesionale extends Model
{
    protected $fillable = [
        'id', 'EmpresaId', 'DiasDesde',
        'DiasHasta', 'HorasDesde', 'HorasHasta',
        'Actividad1', 'Actividad2', 'Actividad3',
        'Actividad4', 'PuestoOfrecido', 'Enfoque',
        'Estado', 'created_at', 'updated_at',
    ];

    public function PostulacionPractica(){
        return $this->hasMany(PostulacionPractica::class, 'id', 'practicaid');
      }
}
