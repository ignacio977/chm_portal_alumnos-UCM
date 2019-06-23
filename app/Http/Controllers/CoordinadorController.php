<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostulacionesPractica;
use App\Practicasprofesionale;

class CoordinadorController extends Controller
{
    public function AprobarPracticas()
    {
       $Coleccion = PostulacionesPractica::where('estado', 'Pendiente')->paginate(3);
       return view('Profesores.practicas', compact('Coleccion'));

    }

    public function CambiarEstado()
    {
       $data = request()->all();
       $id = $data["id_postulacion"];
       $estado = $data["estado"];

       $postulacion = PostulacionesPractica::where('id', $id)->first();
       $postulacion->estado = $estado;
       $postulacion->save();

       $practica = Practicasprofesionale::all()->where('id', $postulacion->practicaid)->first();
       $practica->Estado = "Asignada";
       $practica->save();
      
       if ($estado=="Aceptada") {
         $postulacionesRestantes = PostulacionesPractica::where('alumnoid', $postulacion->alumno->id)->where('id', '!=', $id)->get();
         $postulacionesDesechadas = PostulacionesPractica::where('practicaid', $postulacion->practicaid)->where('id', '!=', $id)->get();   

         $listaPracticas = $postulacionesRestantes->merge($postulacionesDesechadas);   
         foreach ($listaPracticas as $postulacion) {
            $postulacion->estado = "Rechazada";
            $postulacion->save();
         }
      } 


       return redirect('/profesor/coordinador');

    }
}