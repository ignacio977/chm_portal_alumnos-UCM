<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\PostulacionesPractica;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'rut', 'password',
        'nombres', 'apellidos', 'email', 'direccion_actual',
        'direccion_procedencia', 'telefono', 'celular', 'fecha_ingreso',
        'cargo', 'departamento', 'tipo_usuario', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function PostulacionPractica(){
        return $this->hasMany(PostulacionesPractica::class, 'alumnoid', 'id');
    }

    public function UsuarioRespuesta(){
        return $this->hasMany(Respuesta::class, 'alumnoid', 'id');
    }
    
    public function UsuarioComentario(){
        return $this->hasMany(Comentario::class, 'alumnoid', 'id');
    }
}
