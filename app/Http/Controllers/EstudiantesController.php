<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\User;
use App\practicasprofesionale;
use App\PostulacionesPractica;

class EstudiantesController extends Controller
{
    public function index()
    {
        return view('Estudiantes.index');
    }

    public function create()
    {
        //
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
        $Practicas= practicasprofesionale:: where('Estado', '=', 'Aprobado')->
                                            whereNotIn('id',$practica_en_curso)->
                                            paginate(1);
        return view('Estudiantes.CatalogoPractica',compact('Practicas'));
    }

    public function practicasdetalle(Request $request)
    {
        $Practicas['Practicas'] =   DB::table('practicasprofesionales')
                                    ->where('Estado', '=', 'Aprobado')
                                    ->where('id',$request->id)
                                    ->get();
        return view('Estudiantes.PracticasDetalle',compact('Practicas'));
    }
}
