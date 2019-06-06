<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
      DB::table('users')->insert([ 
        'rut' => '0.000.000-0',
        'password' => bcrypt('123456789'),
        'nombres' => 'Nombres Estudiante',
        'apellidos' => 'Apellidos Estudiante',
        'email' => 'estudiante@gmail.com',
        'direccion_actual' => 'Calle Ejemplo',
        'direccion_procedencia' => 'Pasaje Ejemplo',
        'telefono' => '72111111',
        'celular' => '911111111',
        'foto' => '',
        'fecha_ingreso' => Carbon::parse('2015-01-01'),
        'tipo_usuario' => 'estudiante',
      ]);
      DB::table('users')->insert([ 
        'rut' => '1.111.111-1',
        'password' => bcrypt('123456789'),
        'nombres' => 'Nombres Profesor',
        'apellidos' => 'Apellidos Profesor',
        'email' => 'profesor@gmail.com',
        'direccion_actual' => 'Calle Ejemplo',
        'direccion_procedencia' => 'Pasaje Ejemplo',
        'telefono' => '72111111',
        'celular' => '911111111',
        'foto' => '',
        'cargo' => 'Cargo Ejemplo',
        'departamento' => 'Departamento Ejemplo',
        'tipo_usuario' => 'profesor',
      ]);
      DB::table('users')->insert([ 
        'rut' => '2.222.222-2',
        'password' => bcrypt('123456789'),
        'nombres' => 'Nombres Director',
        'apellidos' => 'Apellidos Director',
        'email' => 'director@gmail.com',
        'direccion_actual' => 'Calle Ejemplo',
        'direccion_procedencia' => 'Pasaje Ejemplo',
        'telefono' => '72111111',
        'celular' => '911111111',
        'foto' => '',
        'tipo_usuario' => 'director',
      ]);
      DB::table('users')->insert([ 
        'rut' => '3.333.333-3',
        'password' => bcrypt('123456789'),
        'nombres' => 'Nombres Empresa',
        'apellidos' => 'NE',
        'email' => 'empresa@gmail.com',
        'direccion_actual' => 'Calle Ejemplo',
        'direccion_procedencia' => 'Pasaje Ejemplo',
        'telefono' => '72111111',
        'celular' => '911111111',
        'foto' => '',
        'tipo_usuario' => 'empresa',
      ]);
      DB::table('users')->insert([ 
        'rut' => '4.444.444-4',
        'password' => bcrypt('123456789'),
        'nombres' => 'Nombres Secretaria',
        'apellidos' => 'Apellidos Secretaria',
        'email' => 'secretaria@gmail.com',
        'direccion_actual' => 'Calle Ejemplo',
        'direccion_procedencia' => 'Pasaje Ejemplo',
        'telefono' => '72111111',
        'celular' => '911111111',
        'foto' => '',
        'tipo_usuario' => 'secretaria',
      ]);

        DB::table('users')->insert([ 
          'rut' => '5.555.555-5',
          'password' => bcrypt('123456789'),
          'nombres' => 'Estudiante 2',
          'apellidos' => 'Apellidos Estudiante 2',
          'email' => 'estudiante2@gmail.com',
          'direccion_actual' => 'Calle Ejemplo',
          'direccion_procedencia' => 'Pasaje Ejemplo',
          'telefono' => '72111111',
          'celular' => '911111111',
          'fecha_ingreso' => Carbon::parse('2015-01-01'),
          'tipo_usuario' => 'estudiante',
        ]);

          DB::table('users')->insert([ 
            'rut' => '6.666.666-6',
            'password' => bcrypt('123456789'),
            'nombres' => 'Estudiante 3',
            'apellidos' => 'Apellidos Estudiante',
            'email' => 'apellido6@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'fecha_ingreso' => Carbon::parse('2015-01-01'),
            'tipo_usuario' => 'estudiante',
          ]);

          DB::table('users')->insert([ 
            'rut' => '7.777.777-7',
            'password' => bcrypt('123456789'),
            'nombres' => 'Estudiante 4',
            'apellidos' => 'Apellidos Estudiante 4',
            'email' => 'estudiante4@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'fecha_ingreso' => Carbon::parse('2015-01-01'),
            'tipo_usuario' => 'estudiante',
          ]);

          DB::table('users')->insert([ 
            'rut' => '8.888.888-8',
            'password' => bcrypt('123456789'),
            'nombres' => 'Nombre Empresa 2',
            'apellidos' => 'NE',
            'email' => 'empresa2@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'tipo_usuario' => 'empresa',
          ]);

          DB::table('users')->insert([ 
            'rut' => '9.999.999-9',
            'password' => bcrypt('123456789'),
            'nombres' => 'Nombre Empresa 3',
            'apellidos' => 'NE',
            'email' => 'empresa3@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'tipo_usuario' => 'empresa',
          ]);

          DB::table('users')->insert([ 
            'rut' => '11.111.111-1',
            'password' => bcrypt('123456789'),
            'nombres' => 'Nombre Empresa 4',
            'apellidos' => 'NE',
            'email' => 'empresa4@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'tipo_usuario' => 'empresa',
          ]);
    }
}
