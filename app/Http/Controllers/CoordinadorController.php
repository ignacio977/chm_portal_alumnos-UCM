<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostulacionesPractica;
use App\Practicasprofesionale;
use App\User;

class CoordinadorController extends Controller
{
   public function VerPracticas()
    {
      $Coleccion= Practicasprofesionale:: orderBy('updated_at', 'desc')->
                                          paginate(5);
      return view('Profesores.CatalogoProfesor',compact('Coleccion'));       

    }

    public function DetallePracticas(Request $request)
    {
        $Practicas= Practicasprofesionale::where('id', $request->id)->get();
        $ListaAlumnos = Practicasprofesionale::where('id', $request->id)
                                             ->first()
                                             ->PostulacionPractica
                                             ->pluck('alumnoid');
         $Postulantes = User::all()->whereIn('id', $ListaAlumnos);


        return view ('Profesores.CoordinadorDetallePractica', compact('Practicas', 'Postulantes'));
    }

    public function EliminarPractica(Request $request)
    {
      $data = request()->all();
      $id = $data["idpractica"];
      $practica= Practicasprofesionale::find($id);

      foreach ($practica->PostulacionPractica as $postulacion) {
         $postulacion->delete();
      }
      $practica->delete();
      return redirect('/profesor/practicas');
    }

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

    public function AddEmpresa()
    {
       return view('Profesores.AddEmpresa');
    }

    public function NuevaEmpresa()
    {
      $data = request()->all();

      $NuevaEmpresa = new User;
      $NuevaEmpresa->rut= $data["rut"];
      $NuevaEmpresa->nombres= $data["name"];
      $NuevaEmpresa->password= bcrypt($data["password"]);
      $NuevaEmpresa->email= $data["email"];
      $NuevaEmpresa->direccion_actual= $data["direccion"];
      $NuevaEmpresa->telefono= $data["phone"];
      $NuevaEmpresa->apellidos= "NE";
      $NuevaEmpresa->direccion_procedencia= "NE";
      $NuevaEmpresa->celular= "NE";
      $NuevaEmpresa->foto= " ";
      $NuevaEmpresa->tipo_usuario= "empresa";

      $NuevaEmpresa->save();
      return view('Profesores.AddEmpresa');
    }

    public function PracticaEnCurso(){
      $Coleccion = PostulacionesPractica:: where("estado","Aceptada")
                                                   ->orderBy('updated_at', 'desc')
                                                   ->paginate(5);
      return view('Profesores.EmpresaPracticaActual', compact('Coleccion'));
    }
}