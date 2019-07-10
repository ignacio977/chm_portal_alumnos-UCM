<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

use App\Practicasprofesionale;
use App\PostulacionesPractica;
use App\EnCursoPractica;
use App\Pregunta;
use App\Respuesta;
use Carbon\Carbon;
use DateTime;

class CoordinadorController extends Controller
{

   public function NuevaEmpresa()
    {
      $data = request()->all();
      $rules = array(

         'nombre' => 'required',
         'rut' => 'required|unique:users,rut',
         'email' => 'required:email|unique:users,email',
         'pass' => 'required',
         'phone' => 'required',
         'direccion' => 'required'
      );

      for ($i=0; $i < 6; $i++) {
         $errores[$i] = "";
       }

      if ($data["nombre"] == null) $errores[0]="El nombre es requerido";
      if ($data["rut"] == null) $errores[1]="El rut es requerido";
      if ($data["email"] == null) $errores[2]="El email es requerido";
      if ($data["pass"] == null) $errores[3]="La contraseña es requerida";
      if ($data["phone"] == null) $errores[4]="El telefono es requerido";
      if ($data["direccion"] == null) $errores[5]="La direccion es requerida";

      if (User::where('rut', $data["rut"])->get()->count() == 1) {
         $errores[1]="Este usuario ya se encuentra registrado";
      }
      if (User::where('email', $data["email"])->get()->count() == 1) {
         $errores[2]="Este email ya se encuentra registrado";
      }

      $v = Validator::make($data, $rules);

      if ($v->fails()) {
         return view('Profesores.AddEmpresa', compact('errores'));
      }

      $NuevaEmpresa = new User;
      $NuevaEmpresa->rut= $data["rut"];
      $NuevaEmpresa->nombres= $data["nombre"];
      $NuevaEmpresa->password= bcrypt($data["pass"]);
      $NuevaEmpresa->email= $data["email"];
      $NuevaEmpresa->direccion_actual= $data["direccion"];
      $NuevaEmpresa->telefono= $data["phone"];
      $NuevaEmpresa->apellidos= "NE";
      $NuevaEmpresa->direccion_procedencia= "NE";
      $NuevaEmpresa->celular= "NE";
      $NuevaEmpresa->foto= " ";
      $NuevaEmpresa->tipo_usuario= "empresa";

      $NuevaEmpresa->save();
      return view('Profesores.AddEmpresa', compact('errores'));
    }

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
       for ($i=0; $i < 6; $i++) {
         $errores[$i] = "";
       }
       return view('Profesores.AddEmpresa', compact('errores'));
    }


    public function PracticaEnCurso(){
      $Coleccion = EnCursoPractica:: where("estado","EnCurso")
                                                   ->orderBy('updated_at', 'desc')
                                                   ->paginate(5);
      return view('Profesores.PracticaEnCursoProfesor', compact('Coleccion'));
    }

    public function   PracticasConcluidas(){
      $practicas = PostulacionesPractica:: where("estado","Concluida")
                                                   ->orderBy('updated_at', 'desc')
                                                   ->paginate(5);
      return view('Profesores.EmpresaPracticaActual', compact('practicas'));
    }


    public function SubirNotas(){
      $data = request()->all();
      $id = $data["id"];
      $nota1 = $data["nota1"];
      $nota2 = $data["nota2"];
      $nota3 = $data["nota3"];
      $isChecked = request()->has('finalizar');

      if ($nota1<1) $nota1 = 1;
      if ($nota1>7) $nota1 = 7; 

      if ($nota2<1) $nota2 = 1;
      if ($nota2>7) $nota2 = 7; 

      if ($nota3<1) $nota3 = 1;
      if ($nota3>7) $nota3 = 7; 

      $PracticaEnCurso = EnCursoPractica::find($id);
      $PracticaEnCurso->nota1 = $nota1;
      $PracticaEnCurso->nota2 = $nota2;
      $PracticaEnCurso->nota3 = $nota3;

      if ($isChecked) {
         $PracticaEnCurso->estado = "Finalizada";
         $CambioInspeccion = PostulacionesPractica::find($PracticaEnCurso->practicaid);
         $CambioInspeccion->inspeccionado = new DateTime();
         $CambioInspeccion->timestamps = false;
         $CambioInspeccion->save();
      }

      $PracticaEnCurso->save();

      return redirect('/profesor/coordinador/PracticaActual');
    }


}
