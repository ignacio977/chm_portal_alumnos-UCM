<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([ 
            'rut' => '0',
            'password' => bcrypt('0'),
            'nombres' => 'Nombres Estudiante',
            'apellidos' => 'Apellidos Estudiante',
            'email' => 'estudiante@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'fecha_ingreso' => Carbon::parse('2015-01-01'),
            'tipo_usuario' => 'estudiante',
          ]);

          DB::table('users')->insert([ 
            'rut' => '1',
            'password' => bcrypt('1'),
            'nombres' => 'Nombres Profesor',
            'apellidos' => 'Apellidos Profesor',
            'email' => 'profesor@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'cargo' => 'Cargo Ejemplo',
            'departamento' => 'Departamento Ejemplo',
            'tipo_usuario' => 'profesor',
          ]);

          DB::table('users')->insert([ 
            'rut' => '2',
            'password' => bcrypt('2'),
            'nombres' => 'Nombres Director',
            'apellidos' => 'Apellidos Director',
            'email' => 'director@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'tipo_usuario' => 'director',
          ]);

          DB::table('users')->insert([ 
            'rut' => '3',
            'password' => bcrypt('3'),
            'nombres' => 'Nombres Empresa',
            'apellidos' => 'NE',
            'email' => 'empresa@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'tipo_usuario' => 'empresa',
          ]);

          DB::table('users')->insert([ 
            'rut' => '4',
            'password' => bcrypt('4'),
            'nombres' => 'Nombres Secretaria',
            'apellidos' => 'Apellidos Secretaria',
            'email' => 'secretaria@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'tipo_usuario' => 'secretaria',
          ]);
    }
}
