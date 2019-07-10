<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Salas;
use App\Reserva;
use App\User;
use App\Practicasprofesionale;
use App\PostulacionesPractica;


class ProfesoresController extends Controller
{
    public function index()
    {

        $professors = User::All();
        $id_reserva = DB::table('reserva')
                      ->select('reserva.id_sala')
                      ->where('reserva.estado', '=', 3)
                      ->get();
        $i= count($id_reserva);
        if ($i != 0){
          $reserva = DB::table('reserva')
                        ->join('salas', 'salas.id', '=','reserva.id_sala')
                        ->select('reserva.id','reserva.id_user', 'salas.nombre', 'reserva.bloque','reserva.dia_semana','reserva.comentario')
                        ->where([
                                 ['reserva.estado', '=', 3],
                               ])
                        ->get();
          return view('Profesores.index', compact('professors','reserva','i'));
        }
        else {
          $i=0;
          return view('Profesores.index', compact('professors','i'));
        }

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

    }


     public function show2($id, $fi, $ff, $nombre, $capacidad, $dia_semana)
     {
       // return("estoy en show");
         return view('Profesores.reserva_busqueda', compact('id','fi','ff','nombre','capacidad','dia_semana'));
     }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroycomentario($id)
    {
      $reserva = Reserva::find($id); //Esta funcion elimina la reserva seleccionado
      $reserva -> delete();
      return redirect()->route('profesor');
    }

    public function buscar_disponibilidad(Request $request)
    {
      $dia_semana = $request->dia_semana;
      $fi = $request->fecha_ingreso;
      $ff = $request->fecha_salida;
      $fi=date("Y-m-d", strtotime($fi));
      $ff=date("Y-m-d", strtotime($ff));
      $reservas = DB::table('reserva')
                      ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                      ->select('reserva.id','reserva.id_sala','reserva.dia_semana','reserva.bloque')
                      ->where([
                          ['reserva.dia_semana', '=', $request->dia_semana],
                          ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                          ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                          ])
                      ->orwhere([
                          ['reserva.dia_semana', '=', $request->dia_semana],
                          ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                          ['reserva.fecha_salida', '>', $request->fecha_salida],
                          ])
                      ->orwhere([
                          ['reserva.dia_semana', '=', $request->dia_semana],
                          ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                          ['reserva.fecha_salida', '=', $request->fecha_salida],
                          ])
                       ->orwhere([
                          ['reserva.dia_semana', '=', $request->dia_semana],
                          ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                          ])
                       ->orwhere([
                          ['reserva.dia_semana', '=', $request->dia_semana],
                          ['reserva.fecha_salida', '=', $request->fecha_salida],
                          ])
                       ->orwhere([
                          ['reserva.dia_semana', '=', $request->dia_semana],
                          ['reserva.fecha_ingreso', '>', $request->fecha_ingreso],
                          ['reserva.fecha_salida', '<', $request->fecha_salida],
                        ])
                      ->get();
       $salas = DB::table('salas')
                     ->select('salas.id', 'salas.nombre', 'salas.capacidad')
                     ->get();
      $bloques = array();
      $i = 0;
      if ($request->bloque_1 == 1) {
        $bloques[$i] = $request->bloque_1;

        $i++;
      }
      if ($request->bloque_2 == 2) {
        $bloques[$i] = $request->bloque_2;
        $i++;
      }
      if ($request->bloque_3 == 3) {
        $bloques[$i] = $request->bloque_3;
        $i++;
      }
      if ($request->bloque_4 == 4) {
        $bloques[$i] = $request->bloque_4;
        $i++;
      }
      if ($request->bloque_5 == 5) {
        $bloques[$i] = $request->bloque_5;
        $i++;
      }
      if ($request->bloque_6 == 6) {
        $bloques[$i] = $request->bloque_6;
        $i++;
      }
      if ($request->bloque_7 == 7) {
        $bloques[$i] = $request->bloque_7;
        $i++;
      }
      if ($request->bloque_8 == 8) {
        $bloques[$i] = $request->bloque_8;
        $i++;
      }
      if ($request->bloque_9 == 9) {
        $bloques[$i] = $request->bloque_9;
      }

     //dd($bloques[0]);

        // return ('estoy en busqueda profe');
       if (($request->input('fecha_ingreso')) <= ($request->input('fecha_salida')) ) {
         // return $clon;
          return view('Profesores.resultado_busqueda', compact('bloques', 'reservas','salas','fi','ff','dia_semana'));
       }
       else{
           return redirect('/profesores_buscar_disponibilidad')->with('error_reserva', 'Ingrese fecha correctamente');
      }
    }


    public function listado_reservas()
    {
        $reserva = DB::table('reserva')
                      ->join('salas', 'salas.id', '=','reserva.id_sala')
                      ->select('reserva.id_user','salas.nombre', 'reserva.bloque','reserva.dia_semana','reserva.estado', 'reserva.fecha_ingreso','reserva.fecha_salida')
                      ->get();
         return view('Profesores.listado_reservas')->with('reserva', $reserva);
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
                             ['reserva.dia_semana', '=', $request->dia_semana],
                             ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                             ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                             ])
                         ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_1],
                             ['reserva.dia_semana', '=', $request->dia_semana],
                             ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                             ['reserva.fecha_salida', '>', $request->fecha_salida],
                             ])
                         ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_1],
                             ['reserva.dia_semana', '=', $request->dia_semana],
                             ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                             ['reserva.fecha_salida', '=', $request->fecha_salida],
                             ])
                          ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_1],
                             ['reserva.dia_semana', '=', $request->dia_semana],
                             ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                             ])
                          ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_1],
                             ['reserva.dia_semana', '=', $request->dia_semana],
                             ['reserva.fecha_salida', '=', $request->fecha_salida],
                             ])
                          ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_1],
                             ['reserva.dia_semana', '=', $request->dia_semana],
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
                                         $reserva->dia_semana = $request->dia_semana;
                                         $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                         $reserva->fecha_salida = $request->input('fecha_salida');
                                         $reserva->save();
                              }
                              else {
                                return redirect('/profesores_reserva')->with('error_reserva', ' Sala ocupada en el bloque 1');
                              }
                         }
                         else{
                             return redirect('/profesores_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                        }
          }
          if ($request->bloque_2 == 2){
            $reservas = DB::table('reserva')
                            ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                            ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                            ->where([
                                ['salas.id', '=',$id_sala[0]->id],
                                ['reserva.bloque', '=', $request->bloque_2],
                                ['reserva.dia_semana', '=', $request->dia_semana],
                                ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                                ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                                ])
                            ->orwhere([
                                ['salas.id', '=',$id_sala[0]->id],
                                ['reserva.bloque', '=', $request->bloque_2],
                                ['reserva.dia_semana', '=', $request->dia_semana],
                                ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                                ['reserva.fecha_salida', '>', $request->fecha_salida],
                                ])
                            ->orwhere([
                                ['salas.id', '=',$id_sala[0]->id],
                                ['reserva.bloque', '=', $request->bloque_2],
                                ['reserva.dia_semana', '=', $request->dia_semana],
                                ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                                ['reserva.fecha_salida', '=', $request->fecha_salida],
                                ])
                             ->orwhere([
                                ['salas.id', '=',$id_sala[0]->id],
                                ['reserva.bloque', '=', $request->bloque_2],
                                ['reserva.dia_semana', '=', $request->dia_semana],
                                ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                                ])
                             ->orwhere([
                                ['salas.id', '=',$id_sala[0]->id],
                                ['reserva.bloque', '=', $request->bloque_2],
                                ['reserva.dia_semana', '=', $request->dia_semana],
                                ['reserva.fecha_salida', '=', $request->fecha_salida],
                                ])
                             ->orwhere([
                                ['salas.id', '=',$id_sala[0]->id],
                                ['reserva.bloque', '=', $request->bloque_2],
                                ['reserva.dia_semana', '=', $request->dia_semana],
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
                                            $reserva->dia_semana = $request->dia_semana;
                                            $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                            $reserva->fecha_salida = $request->input('fecha_salida');
                                            $reserva->save();
                                 }
                                 else {
                                  return redirect('/profesores_reserva')->with('error_reserva', 'Sala ocupada en el bloque 2');
                                 }
                            }
                            else{
                              return redirect('/profesores_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                            }
        }
       if ($request->bloque_3 == 3){
         $reservas = DB::table('reserva')
                         ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                         ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                         ->where([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_3],
                             ['reserva.dia_semana', '=', $request->dia_semana],
                             ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                             ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                             ])
                         ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_3],
                             ['reserva.dia_semana', '=', $request->dia_semana],
                             ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                             ['reserva.fecha_salida', '>', $request->fecha_salida],
                             ])
                         ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_3],
                             ['reserva.dia_semana', '=', $request->dia_semana],
                             ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                             ['reserva.fecha_salida', '=', $request->fecha_salida],
                             ])
                          ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_3],
                             ['reserva.dia_semana', '=', $request->dia_semana],
                             ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                             ])
                          ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_3],
                             ['reserva.dia_semana', '=', $request->dia_semana],
                             ['reserva.fecha_salida', '=', $request->fecha_salida],
                             ])
                          ->orwhere([
                             ['salas.id', '=',$id_sala[0]->id],
                             ['reserva.bloque', '=', $request->bloque_3],
                             ['reserva.dia_semana', '=', $request->dia_semana],
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
                                         $reserva->dia_semana = $request->dia_semana;
                                         $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                         $reserva->fecha_salida = $request->input('fecha_salida');
                                         $reserva->save();
                              }
                              else {
                                return redirect('/profesores_reserva')->with('error_reserva', 'Sala ocupada en el bloque 3');
                              }
                         }
                         else{
                           return redirect('/profesores_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                         }
        }
        if ($request->bloque_4 == 4){
          $reservas = DB::table('reserva')
                          ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                          ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                          ->where([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_4],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_4],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                              ['reserva.fecha_salida', '>', $request->fecha_salida],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_4],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_4],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_4],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_4],
                              ['reserva.dia_semana', '=', $request->dia_semana],
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
                                          $reserva->dia_semana = $request->dia_semana;
                                          $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                          $reserva->fecha_salida = $request->input('fecha_salida');
                                          $reserva->save();
                               }
                               else {
                                return redirect('/profesores_reserva')->with('error_reserva', 'Sala ocupada en el bloque 4');
                               }
                          }
                          else{
                            return redirect('/profesores_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                          }
        }
        if ($request->bloque_5 == 5){
          $reservas = DB::table('reserva')
                          ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                          ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                          ->where([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_5],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_5],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                              ['reserva.fecha_salida', '>', $request->fecha_salida],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_5],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_5],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_5],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_5],
                              ['reserva.dia_semana', '=', $request->dia_semana],
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
                                          $reserva->dia_semana = $request->dia_semana;
                                          $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                          $reserva->fecha_salida = $request->input('fecha_salida');
                                          $reserva->save();
                               }
                               else {
                                return redirect('/profesores_reserva')->with('error_reserva', 'Sala ocupada en el bloque 5');
                               }
                          }
                          else{
                            return redirect('/profesores_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                          }
        }
        if ($request->bloque_6 == 6){
          $reservas = DB::table('reserva')
                          ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                          ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                          ->where([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_6],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_6],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                              ['reserva.fecha_salida', '>', $request->fecha_salida],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_6],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_6],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_6],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_6],
                              ['reserva.dia_semana', '=', $request->dia_semana],
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
                                          $reserva->dia_semana = $request->dia_semana;
                                          $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                          $reserva->fecha_salida = $request->input('fecha_salida');
                                          $reserva->save();
                               }
                               else {
                                return redirect('/profesores_reserva')->with('error_reserva', 'Sala ocupada en el bloque 6');
                               }
                          }
                          else{
                            return redirect('/profesores_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                          }
        }
        if ($request->bloque_7 == 7){
          $reservas = DB::table('reserva')
                          ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                          ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                          ->where([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_7],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_7],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                              ['reserva.fecha_salida', '>', $request->fecha_salida],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_7],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_7],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_7],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_7],
                              ['reserva.dia_semana', '=', $request->dia_semana],
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
                                          $reserva->dia_semana = $request->dia_semana;
                                          $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                          $reserva->fecha_salida = $request->input('fecha_salida');
                                          $reserva->save();
                               }
                               else {
                                return redirect('/profesores_reserva')->with('error_reserva', 'Sala ocupada en el bloque 7');
                               }
                          }
                          else{
                            return redirect('/profesores_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                          }
        }
        if ($request->bloque_8 == 8){
          $reservas = DB::table('reserva')
                          ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                          ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                          ->where([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_8],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_8],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                              ['reserva.fecha_salida', '>', $request->fecha_salida],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_8],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_8],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_8],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_8],
                              ['reserva.dia_semana', '=', $request->dia_semana],
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
                                          $reserva->dia_semana = $request->dia_semana;
                                          $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                          $reserva->fecha_salida = $request->input('fecha_salida');
                                          $reserva->save();
                               }
                               else {
                                return redirect('/profesores_reserva')->with('error_reserva', 'Sala ocupada en el bloque 8');
                               }
                          }
                          else{
                            return redirect('/profesores_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                          }
        }
        if ($request->bloque_9 == 9){
          $reservas = DB::table('reserva')
                          ->join('salas', 'salas.id', '=', 'reserva.id_sala')
                          ->select('salas.id','salas.nombre', 'salas.capacidad', 'reserva.bloque')
                          ->where([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_9],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_9],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                              ['reserva.fecha_salida', '>', $request->fecha_salida],
                              ])
                          ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_9],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_9],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_9],
                              ['reserva.dia_semana', '=', $request->dia_semana],
                              ['reserva.fecha_salida', '=', $request->fecha_salida],
                              ])
                           ->orwhere([
                              ['salas.id', '=',$id_sala[0]->id],
                              ['reserva.bloque', '=', $request->bloque_9],
                              ['reserva.dia_semana', '=', $request->dia_semana],
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
                                          $reserva->dia_semana = $request->dia_semana;
                                          $reserva->fecha_ingreso = $request->input('fecha_ingreso');
                                          $reserva->fecha_salida = $request->input('fecha_salida');
                                          $reserva->save();
                               }
                               else {
                                return redirect('/profesores_reserva')->with('error_reserva', 'Sala ocupada en el bloque 9');
                               }
                          }
                          else{
                            return redirect('/profesores_reserva')->with('error_reserva', 'Ingrese fecha correctamente');
                          }
        }
        return redirect('/profesores_reserva')->with('status_reserva', 'Se ha ingresado la Reserva correctamente');
   }

}
