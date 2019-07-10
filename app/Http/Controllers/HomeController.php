<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use File;
use Carbon\Carbon;

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

    function cambiar_foto(Request $request) //Funcion para el cambio de PFP (Profile Picture)
    {
        $usuario = Auth::User(); //Obtenemos el ID del usuario logeado
        $rut_limpio= str_replace(array('.','-'), '',$usuario->rut); //Se le quitan puntos y guion al rut 
        $foto_anterior = $usuario->foto; //Directorio de archivo, por si existe un PFP previo
        $this->validate($request, [
        'select_file'  => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);
        $image = $request->file('select_file'); //Declaramos image como el archivo proveniente del select_file
        $new_name = Carbon::now()->timestamp . $rut_limpio . '.' . $image->getClientOriginalExtension(); //Se otorga un nombre al azar con la extension de archivo original
        $image->move(public_path('images/pfp'), $new_name); //Guardamos archivo en carpeta images de public
        $usuario->foto = 'images/pfp/'. $new_name; //Atributo foto del User se le otorga el directorio de su imagen
        $usuario->save();
        if ($foto_anterior != NULL) { //De existir un archivo previamente, se elimina la foto anterior para ahorro de memoria
            if(file_exists($foto_anterior)) {
                unlink($foto_anterior);
                File::delete($foto_anterior);
            }
        }
        return back()->with('path', $new_name);
    }

}
