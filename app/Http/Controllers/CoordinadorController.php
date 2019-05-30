<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostulacionesPractica;

class CoordinadorController extends Controller
{
    public function AprobarPracticas()
    {
       $practicasPendientes = PostulacionesPractica::all()->where('estado', 'Pendiente');
       return view('Profesores.practicas', compact('practicasPendientes'));

    }

    public function CambiarEstado()
    {
       $data = request()->all();
       $id = $data["id_postulacion"];
       $estado = $data["estado"];

       $postulacion = PostulacionesPractica::where('id', $id)->first();
       $postulacion->estado = $estado;
       $postulacion->save();
      
       if ($estado=="Aceptada") {
         $postulacionesRestantes = PostulacionesPractica::where('alumnoid', $postulacion->alumno->id)->where('id', '!=', $id)->get();   

         foreach ($postulacionesRestantes as $postulacion) {
            $postulacion->estado = "Rechazada";
            $postulacion->save();
         }
      } 


       return redirect('/profesor/coordinador');

    }
}