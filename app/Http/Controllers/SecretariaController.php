<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SecretariaController extends Controller
{

    public function index()
    {
        $secretaries = User::All();
        return view('Secretaria.index', compact('secretaries'));
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
