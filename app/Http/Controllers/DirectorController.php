<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DirectorController extends Controller
{
    public function index()
    {
        $directors = User::All();
        return view('Director.index', compact('directors'));
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
