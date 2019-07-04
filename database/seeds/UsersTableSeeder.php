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
            'nombres' => 'Savio Campos',
            'apellidos' => 'Apellidos Estudiante',
            'email' => 'savio@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'foto' => '',
            'fecha_ingreso' => Carbon::parse('2015-01-01'),
            'tipo_usuario' => 'estudiante',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
          ]);
          

          DB::table('users')->insert([ 
            'rut' => '1',
            'password' => bcrypt('1'),
            'nombres' => 'Marco Toranzo',
            'apellidos' => 'Apellidos Profesor',
            'email' => 'MT@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'foto' => '',
            'cargo' => 'Cargo Ejemplo',
            'departamento' => 'Departamento Ejemplo',
            'tipo_usuario' => 'profesor',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
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
            'foto' => '',
            'tipo_usuario' => 'director',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
          ]);

          DB::table('users')->insert([ 
            'rut' => '3',
            'password' => bcrypt('3'),
            'nombres' => 'Microplay',
            'apellidos' => 'NE',
            'email' => 'Microplay@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'foto' => '',
            'tipo_usuario' => 'empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
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
            'foto' => '',
            'tipo_usuario' => 'secretaria',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
          ]);

          DB::table('users')->insert([ 
            'rut' => '5',
            'password' => bcrypt('0'),
            'nombres' => 'Erik Sanoval',
            'apellidos' => 'Apellidos Estudiante',
            'email' => 'Erik@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'foto' =>'',
            'fecha_ingreso' => Carbon::parse('2015-01-01'),
            'tipo_usuario' => 'estudiante',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
          ]);

          DB::table('users')->insert([ 
            'rut' => '6',
            'password' => bcrypt('0'),
            'nombres' => 'Sergio Valdes',
            'apellidos' => 'Apellidos Estudiante',
            'email' => 'Sergio@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'fecha_ingreso' => Carbon::parse('2015-01-01'),
            'tipo_usuario' => 'estudiante',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
          ]);

          DB::table('users')->insert([ 
            'rut' => '7',
            'password' => bcrypt('0'),
            'nombres' => 'Bastian Aliaga',
            'apellidos' => 'Apellidos Estudiante',
            'email' => 'Bastian@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'fecha_ingreso' => Carbon::parse('2015-01-01'),
            'tipo_usuario' => 'estudiante',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
          ]);

          DB::table('users')->insert([ 
            'rut' => '8',
            'password' => bcrypt('3'),
            'nombres' => 'PF',
            'apellidos' => 'NE',
            'email' => 'PF@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'tipo_usuario' => 'empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
          ]);

          DB::table('users')->insert([ 
            'rut' => '9',
            'password' => bcrypt('3'),
            'nombres' => 'SuperCompuMundo',
            'apellidos' => 'NE',
            'email' => 'SCM@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'tipo_usuario' => 'empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
          ]);

          DB::table('users')->insert([ 
            'rut' => '10',
            'password' => bcrypt('3'),
            'nombres' => 'HyperMegaRed',
            'apellidos' => 'NE',
            'email' => 'HMR@gmail.com',
            'direccion_actual' => 'Calle Ejemplo',
            'direccion_procedencia' => 'Pasaje Ejemplo',
            'telefono' => '72111111',
            'celular' => '911111111',
            'tipo_usuario' => 'empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
          ]);
    }
}
