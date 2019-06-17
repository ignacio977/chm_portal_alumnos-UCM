<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Practicasprofesionale;
use App\PostulacionesPractica;
use App\Pregunta;
use App\Respuesta;

class EstudiantesController extends Controller
{
    public function index(request $request)
    {
        //dd($request->all()); // muestra el contenido del request
        $students = User::All();
        return view('Estudiantes.index', compact('students'));
    }

    public function solicitud_practica(Request $request)
    {
        $datos = new PostulacionesPractica;
        $datos->practicaid = $request->idpractica;
        $datos->alumnoid = $request->idalumno;
        $datos->fecha = '01-01-01';
        $datos->estado = 'Pendiente';

        $datos->save();
        return redirect(route('CatPag'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function catalogopracticas()
    {
        $estudiante=Auth::user();
        $practica_en_curso=PostulacionesPractica::where('alumnoid','=',$estudiante->id)->pluck('practicaid');
        $Coleccion= Practicasprofesionale:: where('Estado', '=', 'Aprobado')->
                                            whereNotIn('id',$practica_en_curso)->
                                            orderBy('updated_at', 'desc')->
                                            paginate(5);
        return view('Estudiantes.CatalogoPractica',compact('Coleccion'));
    }

    public function practicasdetalle(Request $request)
    {
        $Practicas= Practicasprofesionale:: where('Estado', '=', 'Aprobado')
                                    ->where('id',$request->id)
                                    ->get();

        return view ('Estudiantes.PracticasDetalle', compact('Practicas'));
    }

    public function evaluacionpractica(Request $request)
    {
        $Entrevista = Pregunta::where('TipoPregunta','Practicante')->
                                orderBy('id', 'asc')->
                                get();
        return view ('Estudiantes.EvaluacionAlumnoEmpresa' , compact('Entrevista'));
    }

    public function evaluacionpracticaenvio(Request $request)
    {
        $MatrizEncuesta = $request->Encuesta;

        // $FinalEncuesta = PostulacionesPractica::where('estado','Finalizada')->first();
        // $FinalEncuesta->estado = 'Finalizada y respondida';
        // $FinalEncuesta->save();

        return $MatrizEncuesta;
        foreach ($MatrizEncuesta as $ArrayEncuesta) {
            $IndexMatrix=key($MatrizEncuesta);
            return $ArrayEncuesta;
            foreach ($ArrayEncuesta as $Opcion) {
                $IndexArray=key($ArrayEncuesta);
                
                $IngresoBDRespuesta = new Respuesta;
                $IngresoBDRespuesta->alumnoid = Auth::user()->id;
                $IngresoBDRespuesta->preguntaid = $IndexMatrix;
                $IngresoBDRespuesta->NivelDeConformidad = $IndexArray;
                $IngresoBDRespuesta->save();
            }
        }
        return $request;
    }

}
