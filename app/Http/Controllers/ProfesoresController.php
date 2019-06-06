<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfesoresController extends Controller
{
    public function index()
    {
        $professors = User::All();
        return view('Profesores.index', compact('professors'));
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
}
