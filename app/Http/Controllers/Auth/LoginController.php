<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username(){ //Utilizamos RUT a modo de username (Prev: email)
        return 'rut';
    }

    public function authenticated($request , $user){ //Funcion para redireccionar dependiendo del rol de cada usuario.
        if($user->tipo_usuario == 'estudiante'){
            return redirect()->route('estudiante');
        }
        elseif($user->tipo_usuario == 'profesor'){
            return redirect()->route('profesor');
        }
        elseif($user->tipo_usuario == 'director'){
            return redirect()->route('director');
        }
        elseif($user->tipo_usuario == 'secretaria'){
            return redirect()->route('secretaria');
        }
        elseif($user->tipo_usuario == 'empresa'){
            return redirect()->route('empresa');
        }
    }
}