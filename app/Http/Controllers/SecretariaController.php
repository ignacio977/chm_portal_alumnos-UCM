<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Salas;
use App\Reserva;
use App\User;

class SecretariaController extends Controller
{

    public function index()
    {
        $secretaries = User::All();
        return view('Secretaria.index', compact('secretaries'));
    }
    public function listado_reservas()
    {
        $reserva = Reserva::orderBy('id','ASC')->paginate(6);
         return view('Secretaria.listado_reservas')->with('reserva', $reserva);
    }
    public function listado_salas()
    {
         $salas = Salas::orderBy('id')->paginate(10);
         return view('Secretaria.listado_salas')->with('salas', $salas);
    }

    public function confirmar_listado_reservas()
    {
        $reserva = Reserva::orderBy('id','ASC')->paginate(6);
         return view('Secretaria.confirmar_listado_reservas')->with('reserva', $reserva);

        
        /*$reserva = Reserva::where('estado', '=', 0)->get();
         return view('Secretaria.listado_reservas')->with('reserva', $reserva);*/
    }



    public function agregar_sala(Request $request)
    {
      $agregar = new Salas;
      $agregar->nombre = $request->input('nombre_sala');
      $agregar->capacidad = $request->input('capacidad');
      $agregar ->save();
      return redirect('/secretaria_agregar_sala')->with('status_sala', 'Se ha ingresado la Sala correctamente');
    }
    public function agregar_reserva(Request $request)
    {
     $id_sala = DB::table('salas')
                   ->select('salas.id')
                   ->where('salas.nombre', $request->nombre_sala)
                   ->get();




      if ($request->bloque_1 == 1){
         $reserva = DB::table('reserva')
                         ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                         ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                         ->where([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_1],
                             ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                             ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                             ])
                         ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_1],
                             ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                             ['reserva.fecha_salida', '>', $request->fecha_salida],
                             ])
                         ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_1],
                             ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                             ['reserva.fecha_salida', '=', $request->fecha_salida],
                             ])
                          ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_1],
                             ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                             ])
                          ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_1],
                             ['reserva.fecha_salida', '=', $request->fecha_salida],
                             ])
                          ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_1],
                             ['reserva.fecha_ingreso', '>', $request->fecha_ingreso],
                             ['reserva.fecha_salida', '<', $request->fecha_salida],
                           ])
                         ->get();
                         $cuenta =$reserva->count();
                         if (($request->input('fecha_ingreso')) <= ($request->input('fecha_salida')) ) {
                            if( $cuenta == 0){
                                         $reserva = new Reserva();
                                         $reserva->id_user = $request->id_user;
                                         $reserva->id_sala = $id_sala[0]->id;
                                         $reserva->bloque = $request->bloque_1;
                                         $reserva->estado = $request->estado;
                                         $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                         $reserva->fecha_salida = $request->input('fecha_salida');
                                         $reserva->save();
                              }
                              else {
                                return redirect('/secretaria_reserva')->with('error_reserva', ' Sala ocupada en el bloque 1');
                              }
                         }
                         else{
                             return redirect('/secretaria_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                        }
          }
          if ($request->bloque_2 == 2){
            $reservas = DB::table('reserva')
                            ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                            ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                            ->where([
                                ['salas.id', '=',$id_sala[0]->id],
                                ['reserva.bloque', '=', $request->bloque_2],
                                ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                                ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                                ])
                            ->orwhere([
                                ['salas.id', '=',$id_sala[0]->id],
                                ['reserva.bloque', '=', $request->bloque_2],
                                ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                                ['reserva.fecha_salida', '>', $request->fecha_salida],
                                ])
                            ->orwhere([
                                ['salas.id', '=',$id_sala[0]->id],
                                ['reserva.bloque', '=', $request->bloque_2],
                                ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                                ['reserva.fecha_salida', '=', $request->fecha_salida],
                                ])
                             ->orwhere([
                                ['salas.id', '=',$id_sala[0]->id],
                                ['reserva.bloque', '=', $request->bloque_2],
                                ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                                ])
                             ->orwhere([
                                ['salas.id', '=',$id_sala[0]->id],
                                ['reserva.bloque', '=', $request->bloque_2],
                                ['reserva.fecha_salida', '=', $request->fecha_salida],
                                ])
                             ->orwhere([
                                ['salas.id', '=',$id_sala[0]->id],
                                ['reserva.bloque', '=', $request->bloque_2],
                                ['reserva.fecha_ingreso', '>', $request->fecha_ingreso],
                                ['reserva.fecha_salida', '<', $request->fecha_salida],
                              ])
                            ->get();
                            $cuenta =$reservas->count();
                            if (($request->input('fecha_ingreso')) <= ($request->input('fecha_salida')) ) {
                               if( $cuenta == 0){
                                            $reserva = new Reserva();
                                            $reserva->id_user = $request->id_user;
                                            $reserva->id_sala = $id_sala[0]->id;
                                            $reserva->bloque = $request->bloque_2;
                                            $reserva->estado = $request->estado;
                                            $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                            $reserva->fecha_salida = $request->input('fecha_salida');
                                            $reserva->save();
                                      //  return view('reserva.guardado');
                                 }
                                 else {
                                  return redirect('/secretaria_reserva')->with('error_reserva', 'Sala ocupada en el bloque 2');
                                 }
                            }
                            else{
                              return redirect('/secretaria_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                            }
        }
       if ($request->bloque_3 == 3){
         $reservas = DB::table('reserva')
                         ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                         ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                         ->where([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_3],
                             ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                             ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                             ])
                         ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_3],
                             ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                             ['reserva.fecha_salida', '>', $request->fecha_salida],
                             ])
                         ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_3],
                             ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                             ['reserva.fecha_salida', '=', $request->fecha_salida],
                             ])
                          ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_3],
                             ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                             ])
                          ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_3],
                             ['reserva.fecha_salida', '=', $request->fecha_salida],
                             ])
                          ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_3],
                             ['reserva.fecha_ingreso', '>', $request->fecha_ingreso],
                             ['reserva.fecha_salida', '<', $request->fecha_salida],
                           ])
                         ->get();
                         $cuenta =$reservas->count();
                         if (($request->input('fecha_ingreso')) <= ($request->input('fecha_salida')) ) {
                            if( $cuenta == 0){
                                         $reserva = new Reserva();
                                         $reserva->id_user = $request->id_user;
                                         $reserva->id_sala = $id_sala[0]->id;
                                         $reserva->bloque = $request->bloque_3;
                                         $reserva->estado = $request->estado;
                                         $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                         $reserva->fecha_salida = $request->input('fecha_salida');
                                         $reserva->save();
                                   //  return view('reserva.guardado');
                              }
                              else {
                                return redirect('/secretaria_reserva')->with('error_reserva', 'Sala ocupada en el bloque 3');
                              }
                         }
                         else{
                           return redirect('/secretaria_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                         }
        }
        if ($request->bloque_4 == 4){
          $reservas = DB::table('reserva')
                          ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                          ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                          ->where([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_4],
                              ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_4],
                              ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                              ['reserva.fecha_salida', '>', $request->fecha_salida],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_4],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_4],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_4],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_4],
                              ['reserva.fecha_ingreso', '>', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '<', $request->fecha_salida],
                            ])
                          ->get();
                          $cuenta =$reservas->count();
                          if (($request->input('fecha_ingreso')) <= ($request->input('fecha_salida')) ) {
                             if( $cuenta == 0){
                                          $reserva = new Reserva();
                                          $reserva->id_user = $request->id_user;
                                          $reserva->id_sala = $id_sala[0]->id;
                                          $reserva->bloque = $request->bloque_4;
                                          $reserva->estado = $request->estado;
                                          $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                          $reserva->fecha_salida = $request->input('fecha_salida');
                                          $reserva->save();
                                    //  return view('reserva.guardado');
                               }
                               else {
                                return redirect('/secretaria_reserva')->with('error_reserva', 'Sala ocupada en el bloque 4');
                               }
                          }
                          else{
                            return redirect('/secretaria_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                          }
        }
        if ($request->bloque_5 == 5){
          $reservas = DB::table('reserva')
                          ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                          ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                          ->where([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_5],
                              ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_5],
                              ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                              ['reserva.fecha_salida', '>', $request->fecha_salida],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_5],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_5],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_5],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_5],
                              ['reserva.fecha_ingreso', '>', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '<', $request->fecha_salida],
                            ])
                          ->get();
                          $cuenta =$reservas->count();
                          if (($request->input('fecha_ingreso')) <= ($request->input('fecha_salida')) ) {
                             if( $cuenta == 0){
                                          $reserva = new Reserva();
                                          $reserva->id_user = $request->id_user;
                                          $reserva->id_sala = $id_sala[0]->id;
                                          $reserva->bloque = $request->bloque_5;
                                          $reserva->estado = $request->estado;
                                          $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                          $reserva->fecha_salida = $request->input('fecha_salida');
                                          $reserva->save();
                                    //  return view('reserva.guardado');
                               }
                               else {
                                return redirect('/secretaria_reserva')->with('error_reserva', 'Sala ocupada en el bloque 5');
                               }
                          }
                          else{
                            return redirect('/secretaria_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                          }
        }
        if ($request->bloque_6 == 6){
          $reservas = DB::table('reserva')
                          ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                          ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                          ->where([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_6],
                              ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_6],
                              ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                              ['reserva.fecha_salida', '>', $request->fecha_salida],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_6],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_6],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_6],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_6],
                              ['reserva.fecha_ingreso', '>', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '<', $request->fecha_salida],
                            ])
                          ->get();
                          $cuenta =$reservas->count();
                          if (($request->input('fecha_ingreso')) <= ($request->input('fecha_salida')) ) {
                             if( $cuenta == 0){
                                          $reserva = new Reserva();
                                          $reserva->id_user = $request->id_user;
                                          $reserva->id_sala = $id_sala[0]->id;
                                          $reserva->bloque = $request->bloque_6;
                                          $reserva->estado = $request->estado;
                                          $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                          $reserva->fecha_salida = $request->input('fecha_salida');
                                          $reserva->save();
                                    //  return view('reserva.guardado');
                               }
                               else {
                                return redirect('/secretaria_reserva')->with('error_reserva', 'Sala ocupada en el bloque 6');
                               }
                          }
                          else{
                            return redirect('/secretaria_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                          }
        }
        if ($request->bloque_7 == 7){
          $reservas = DB::table('reserva')
                          ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                          ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                          ->where([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_7],
                              ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_7],
                              ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                              ['reserva.fecha_salida', '>', $request->fecha_salida],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_7],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_7],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_7],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_7],
                              ['reserva.fecha_ingreso', '>', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '<', $request->fecha_salida],
                            ])
                          ->get();
                          $cuenta =$reservas->count();
                          if (($request->input('fecha_ingreso')) <= ($request->input('fecha_salida')) ) {
                             if( $cuenta == 0){
                                          $reserva = new Reserva();
                                          $reserva->id_user = $request->id_user;
                                          $reserva->id_sala = $id_sala[0]->id;
                                          $reserva->bloque = $request->bloque_7;
                                          $reserva->estado = $request->estado;
                                          $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                          $reserva->fecha_salida = $request->input('fecha_salida');
                                          $reserva->save();
                                    //  return view('reserva.guardado');
                               }
                               else {
                                return redirect('/secretaria_reserva')->with('error_reserva', 'Sala ocupada en el bloque 7');
                               }
                          }
                          else{
                            return redirect('/secretaria_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                          }
        }
        if ($request->bloque_8 == 8){
          $reservas = DB::table('reserva')
                          ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                          ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                          ->where([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_8],
                              ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_8],
                              ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                              ['reserva.fecha_salida', '>', $request->fecha_salida],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_8],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_8],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_8],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_8],
                              ['reserva.fecha_ingreso', '>', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '<', $request->fecha_salida],
                            ])
                          ->get();
                          $cuenta =$reservas->count();
                          if (($request->input('fecha_ingreso')) <= ($request->input('fecha_salida')) ) {
                             if( $cuenta == 0){
                                          $reserva = new Reserva();
                                          $reserva->id_user = $request->id_user;
                                          $reserva->id_sala = $id_sala[0]->id;
                                          $reserva->bloque = $request->bloque_8;
                                          $reserva->estado = $request->estado;
                                          $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                          $reserva->fecha_salida = $request->input('fecha_salida');
                                          $reserva->save();
                                    //  return view('reserva.guardado');
                               }
                               else {
                                return redirect('/secretaria_reserva')->with('error_reserva', 'Sala ocupada en el bloque 8');
                               }
                          }
                          else{
                            return redirect('/secretaria_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                          }
        }
        if ($request->bloque_9 == 9){
          $reservas = DB::table('reserva')
                          ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                          ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                          ->where([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_9],
                              ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_9],
                              ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                              ['reserva.fecha_salida', '>', $request->fecha_salida],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_9],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_9],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_9],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_9],
                              ['reserva.fecha_ingreso', '>', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '<', $request->fecha_salida],
                            ])
                          ->get();
                          $cuenta =$reservas->count();
                          if (($request->input('fecha_ingreso')) <= ($request->input('fecha_salida')) ) {
                             if( $cuenta == 0){
                                          $reserva = new Reserva();
                                          $reserva->id_user = $request->id_user;
                                          $reserva->id_sala = $id_sala[0]->id;
                                          $reserva->bloque = $request->bloque_9;
                                          $reserva->estado = $request->estado;
                                          $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                          $reserva->fecha_salida = $request->input('fecha_salida');
                                          $reserva->save();
                                    //  return view('reserva.guardado');
                               }
                               else {
                                return redirect('/secretaria_reserva')->with('error_reserva', 'Sala ocupada en el bloque 9');
                               }
                          }
                          else{
                            return redirect('/secretaria_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                          }
        }
        return redirect('/secretaria_reserva')->with('status_reserva', 'Se ha ingresado la Reserva correctamente');
        
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
        return view('Secretaria.edit_reserva');
    }

    public function edit($id)
    {
        $reserva = Reserva::find($id);//busca la id recibida en la base de datos
        return view('secretaria.confirmar_reserva')->with('reserva', $reserva);
    }

    public function edit_reserva($id)
    {
        $reserva = Reserva::find($id);//busca la id recibida en la base de datos
        return view('secretaria.editar_reserva')->with('reserva', $reserva);
    }

    public function update(Request $request, $id)
    {
        $reserva = Reserva::find($id);
        $reserva-> id_user = $request->id_user;
        $reserva-> id_sala = $request->id_sala;
        $reserva-> bloque = $request->bloque;
        $reserva-> estado = $request->estado;
        $reserva-> fecha_ingreso = $request->input('fecha_ingreso');
        $reserva-> fecha_salida = $request->input('fecha_salida');
        $reserva->save();
        return redirect()->route('listado_reservas');
    }

    public function destroy($id)
    {
      $reserva = Reserva::find($id); //Esta funcion elimina la reserva seleccionado
      $reserva -> delete();
      return redirect()->route('listado_reservas');
    }

    public function destroy_confirmar_reserva($id)
    {
      $reserva = Reserva::find($id); //Esta funcion elimina la reserva seleccionado
      $reserva -> delete();
      return redirect()->route('confirmar_listado_reservas');
    }

    public function destroysala($id)
    {
      $sala = Salas::find($id); //Esta funcion elimina la sala seleccionado
      $sala -> delete();
      return redirect()->route('listado_salas');
    }
}
