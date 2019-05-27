<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    function cambiar_foto(Request $request)
    {
        $usuario = \App\User::find(Auth::user()->id);
        $foto_anterior = Auth::user()->foto;
        $this->validate($request, [
        'select_file'  => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);
        $image = $request->file('select_file');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $usuario->foto = 'images/'. $new_name;
        $usuario->save();
        if ($foto_anterior != NULL) {
            if(file_exists($foto_anterior)) {
                unlink($foto_anterior);
                File::delete($foto_anterior);
            }
        }
        return back()->with('path', $new_name);
    }

}
