<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'id', 'alumnoid',
        'postulacionid', 'comentario'
    ];
    public function ComentarioUsuario(){
        return $this->belongsTo(User::class, 'alumnoid', 'id');
    }
    public function ComentarioPostulacion(){
        return $this->belongsTo(PostulacionesPractica::class, 'postulacionid', 'id');
    }
}
