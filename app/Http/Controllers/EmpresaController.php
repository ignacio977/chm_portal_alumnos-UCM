<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        return view('Empresa.index');
    }

    public function CreacionPracticasProfesionales(Request $request)
    {
        $errores = 0;
        return view('Empresa.CreacionPracticasProfesionales', compact('errores', 'request'));
    }


     public function VerificacionPracticaProfesional(Request $request)
    {
        $errores[0] = "";
        $errores[1] = "";
        $errores[2] = "";
        $errores[3] = "";
        $errores[4] = "";
        $errores[5] = "";
        $actividad = 0;
        if($request->Actividad1 == null || $request->Actividad2 == null || 
        $request->Actividad3 == null || $request->Actividad4 == null){
            $actividad = 0;
            $errores[0] = "Debe haber al menos una actividad";
        }else{
            $actividad ++;
        }
        $campos = 0;

        if($request->DesdeH == null){
            $errores[1] = "Debe ingresar Hora";  //error de no dato DesdeH ingresado
            $campos ++;
        }
        if($request->HastaH == null){
            $errores[2] = "Debe ingresar Hora";  //error de no dato HastaH ingresado
            $campos ++;
        }
        if($request->Enfoque == null){
            $errores[3] = "Debe ingresar Enfoque";  //error de no dato Enfoque ingresado
            $campos ++;
        }
        if($request->PuestoOfrecido == null){
            $errores[4] = "Debe ingresar Puesto Ofrecido";  //error de no dato Puesto Ofrecido ingresado
            $campos ++;
        }
        
        if($actividad != 0 && $campos != 0){
            return view('Empresa.CreacionPracticasProfesionales', compact('errores', 'request'));
        }else{
            if($request->DesdeD == $request->HastaD){
                $errores[5] = "No se puede trabajar semana corrida";    //error mismos dias elegidos
                return view('Empresa.CreacionPracticasProfesionales', compact('errores', 'request'));
            }else{
                $desdeD = $request->DesdeD;
                $hastaD = $request->HastaD;

                if($desdeD < $hastaD){
                    $Dias = 0;
                    for($i = 0; $desdeD < $hastaD; $i++){
                        $desdeD = ($desdeD + 1)%7;
                        $Dias ++;
                    }
                }else{
                    $Dias = 1;
                    for($i = 0; $desdeD > $hastaD; $i++){
                        $desdeD = ($desdeD + 1)%7;
                        $Dias ++;
                    }
                }
                if($request->DesdeH == $request->HastaD){
                    $errores[2] = "No se puede seleccionar la misma hora";    //No hay diferencia de horas, se entra y sale a la misma hora
                    return "No se puede seleccionar misma hora de entrada que salida";
                }
                else{
                    $errores[2] = "";
                    $tipo = $request->DesdeH[6] . $request->DesdeH[7];  //Tipo de hora AM o PM

                    $Hora1 = ($request->DesdeH[0] * 10) + $request->DesdeH[1];
                    if ($tipo == "PM")
                        $Hora1 = ($request->DesdeH[0] * 10) + $request->DesdeH[1] + 12;
    
                    $Min1 = ($request->DesdeH[3] * 10) + $request->DesdeH[4];
                    
                    $tipo = $request->HastaH[6] . $request->HastaH[7];
                    $Hora2 = ($request->HastaH[0] * 10) + $request->HastaH[1];
                    if ($tipo == "PM")
                        $Hora2 = ($request->HastaH[0] * 10) + $request->HastaH[1] + 12;
                    $Min2 = ($request->HastaH[3] * 10) + $request->HastaH[4];
                    $HorasT = $Hora2 - $Hora1;
                    $MinT = $Min2 - $Min1;
                    
                    if($HorasT < 0){
                        $HorasT = $HorasT + 24;
                    }
                    if($MinT < 0){
                        $HorasT --;
                        $MinT = $MinT + 60;
                    }
                    return view('Empresa.Boletin', compact('Dias', 'HorasT', 'MinT','actividad', 'request'));
                }
            }
        }
        return view('Empresa.CreacionPracticasProfesionales', compact('errores'));
    }

    public function InsercionPracticaProfesional(Request $request)
    {
        dd($request->all());
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
