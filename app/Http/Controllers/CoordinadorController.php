<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PracticasProfesionale;

class CoordinadorController extends Controller
{
    public function AprobarPracticas()
    {
       // $practicasPendientes = PostulacionesPractica::all()->where('estado', 'Pendiente');
       // return view('Profesor.practicas', compact('practicasPendientes'));
        return view('Profesor.practicas');
    }
}