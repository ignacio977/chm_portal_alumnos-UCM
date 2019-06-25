<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Practicasprofesionale;
use App\PostulacionesPractica;

class ProfesoresController extends Controller
{
    public function index()
    {
        $professors = User::All();
        return view('Profesores.index', compact('professors'));
    }

    public function mostrar_practicas()
    {
        $practicas= PostulacionesPractica::where('Estado', '=', 'Aprobado')->get();
        return view ('Profesores.MostrarPracticas', compact('practicas'));
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
}
