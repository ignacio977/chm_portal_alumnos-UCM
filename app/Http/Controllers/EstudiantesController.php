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
use App\Comentario;
use App\EnCursoPractica;
use Carbon\Carbon;
use DateTime;

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
        $datos->inspeccionado = new DateTime();

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
        $Practicas = Practicasprofesionale:: where('Estado', '=', 'Aprobado')
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

        $CambioInspeccion = PostulacionesPractica::where('alumnoid',Auth::user()->id)->
                                                    where('estado','Aceptada')->
                                                    orWhere('Estado', '=', 'Confirmada')->
                                                    first();
        $CambioInspeccion->inspeccionado = new DateTime();
        $CambioInspeccion->timestamps = false;
        $CambioInspeccion->save();

        $FinalEncuesta = EnCursoPractica::  where('alumnoid',Auth::user()->id)->
                                            where('estado','Finalizada')->
                                            orWhere('estado','FinalizadaRespondidaE')->
                                            first();
        if($FinalEncuesta->estado == "Finalizada"){
            $FinalEncuesta->estado = "FinalizadaRespondidaA";
        }
        if($FinalEncuesta->estado == "FinalizadaRespondidaE"){
            $FinalEncuesta->estado = "Concluida";
        }
        $FinalEncuesta->save();

        foreach ($MatrizEncuesta as $ArrayEncuesta) {
            foreach ($ArrayEncuesta as $Opcion) {
                $IndexMatrix = explode(',', $Opcion);
                $IndexArrayY = $IndexMatrix[0];
                $IndexArrayX = key($ArrayEncuesta);


                $IngresoBDRespuesta = new Respuesta;
                $IngresoBDRespuesta->alumnoid = Auth::user()->id;
                $IngresoBDRespuesta->preguntaid = $IndexArrayY;
                $IngresoBDRespuesta->postulacionid = $FinalEncuesta->id;
                $IngresoBDRespuesta->NivelDeConformidad = $IndexArrayX;
                $IngresoBDRespuesta->save();
            }
        }
        $IngresoBDComentario = new Comentario;
        $IngresoBDComentario->alumnoid = Auth::user()->id;
        $IngresoBDComentario->postulacionid = $FinalEncuesta->postulacionid;
        $IngresoBDComentario->comentario = $request->Comentario;
        $IngresoBDComentario->save();

        return redirect(route('estudiante'));
    }

    public function novedadespractica(Request $request)
    {
        $estudiante=Auth::user();
        $Notificaciones = PostulacionesPractica::   where('alumnoid','=',$estudiante->id)->
                                                    whereColumn('inspeccionado','<','updated_at')->
                                                    get();
        $Registros = PostulacionesPractica::where('alumnoid','=',$estudiante->id)->
                                            whereColumn('inspeccionado','>=','updated_at')->
                                            get();
        return view ('Estudiantes.NovedadesPractica' , compact('Notificaciones','Registros'));
    }
    public function VistoPractica(Request $request)
    {
        $ValorId = $request->tag;
        $fecha = Carbon::now();
        $VistoPostulacion = PostulacionesPractica::where('id',$ValorId)->first();
        $VistoPostulacion->timestamps = false;
        $VistoPostulacion->inspeccionado = $fecha;
        $VistoPostulacion->save();
        return "ok";
    }

}
