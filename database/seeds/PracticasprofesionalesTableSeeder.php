<?php

use Illuminate\Database\Seeder;

class PracticasprofesionalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '4',
            'DiasDesde'     => 'Martes',
            'DiasHasta'     => 'Viernes',
            'HorasDesde'    => '08:30 AM',
            'HorasHasta'    => '04:30 PM',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Junior en programacion',
            'Enfoque'       => 'Python',
            'Estado'        => 'Pendiente',
            'updated_at'    => '2019/01/30',
            'created_at'        => new DateTime()
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '9',
            'DiasDesde'     => 'Lunes',
            'DiasHasta'     => 'Jueves',
            'HorasDesde'    => '09:00 AM',
            'HorasHasta'    => '05:00 PM',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Secretario',
            'Enfoque'       => 'Typescript,Angular',
            'Estado'        => 'Aprobado',
            'updated_at'    => '2019/02/05',
            'created_at'        => new DateTime()
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '10',
            'DiasDesde'     => 'Lunes',
            'DiasHasta'     => 'Miercoles',
            'HorasDesde'    => '08:00 AM',
            'HorasHasta'    => '05:00 PM',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Inspector de impresoras',
            'Enfoque'       => 'Ruby BackEnd',
            'Estado'        => 'Aprobado',
            'updated_at'    => '2019/03/03',
            'created_at'        => new DateTime()
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '10',
            'DiasDesde'     => 'Lunes',
            'DiasHasta'     => 'Jueves',
            'HorasDesde'    => '09:00',
            'HorasHasta'    => '18:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Inspector de impresoras',
            'Enfoque'       => 'Ruby',
            'Estado'        => 'Aprobado',
            'updated_at'    => '2019/03/03',
            'created_at'        => new DateTime()
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '10',
            'DiasDesde'     => 'Lunes',
            'DiasHasta'     => 'Miercoles',
            'HorasDesde'    => '12:00',
            'HorasHasta'    => '19:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Inspector de impresoras',
            'Enfoque'       => 'HTML y Materialize',
            'Estado'        => 'Aprobado',
            'updated_at'    => '2019/03/03',
            'created_at'        => new DateTime()
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '10',
            'DiasDesde'     => 'Lunes',
            'DiasHasta'     => 'Miercoles',
            'HorasDesde'    => '19:00',
            'HorasHasta'    => '04:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Inspector de impresoras',
            'Enfoque'       => 'PostgreSQL',
            'Estado'        => 'Aprobado',
            'updated_at'    => '2019/03/03',
            'created_at'        => new DateTime()
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '10',
            'DiasDesde'     => 'Martes',
            'DiasHasta'     => 'Viernes',
            'HorasDesde'    => '12:00',
            'HorasHasta'    => '18:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Inspector de impresoras',
            'Enfoque'       => 'BI en Cognos',
            'Estado'        => 'Aprobado',
            'updated_at'    => '2019/03/03',
            'created_at'        => new DateTime()
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '10',
            'DiasDesde'     => 'Jueves',
            'DiasHasta'     => 'Domingo',
            'HorasDesde'    => '08:00',
            'HorasHasta'    => '17:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Inspector de impresoras',
            'Enfoque'       => 'Ruby on Rails',
            'Estado'        => 'Aprobado',
            'updated_at'    => '2019/03/03',
            'created_at'        => new DateTime()
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '10',
            'DiasDesde'     => 'Lunes',
            'DiasHasta'     => 'Viernes',
            'HorasDesde'    => '09:00',
            'HorasHasta'    => '15:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Inspector de impresoras',
            'Enfoque'       => 'Ruby on Rails',
            'Estado'        => 'Aprobado',
            'updated_at'    => '2019/05/03',
            'created_at'        => new DateTime()
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '10',
            'DiasDesde'     => 'Martes',
            'DiasHasta'     => 'Domingo',
            'HorasDesde'    => '08:00',
            'HorasHasta'    => '15:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Inspector de impresoras',
            'Enfoque'       => 'HTML y Vue.js',
            'Estado'        => 'Aprobado',
            'updated_at'    => '2019/05/03',
            'created_at'        => new DateTime()
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '10',
            'DiasDesde'     => 'Lunes',
            'DiasHasta'     => 'Viernes',
            'HorasDesde'    => '08:00',
            'HorasHasta'    => '17:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Inspector de impresoras',
            'Enfoque'       => 'PostgreSQL',
            'Estado'        => 'Aprobado',
            'updated_at'    => '2019/05/25',
            'created_at'        => new DateTime()
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '10',
            'DiasDesde'     => 'Lunes',
            'DiasHasta'     => 'Sabado',
            'HorasDesde'    => '10:00',
            'HorasHasta'    => '19:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Inspector de impresoras',
            'Enfoque'       => 'Flutter',
            'Estado'        => 'Aprobado',
            'updated_at'    => '2019/05/25',
            'created_at'        => new DateTime()
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '10',
            'DiasDesde'     => 'Lunes',
            'DiasHasta'     => 'Sabado',
            'HorasDesde'    => '19:00',
            'HorasHasta'    => '04:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Inspector de impresoras',
            'Enfoque'       => 'Flutter',
            'Estado'        => 'Aprobado',
            'updated_at'    => '2019/05/25',
            'created_at'        => new DateTime()
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '10',
            'DiasDesde'     => 'Lunes',
            'DiasHasta'     => 'Sabado',
            'HorasDesde'    => '04:00',
            'HorasHasta'    => '12:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Inspector de impresoras',
            'Enfoque'       => 'Flutter',
            'Estado'        => 'Aprobado',
            'updated_at'    => '2019/05/25',
            'created_at'        => new DateTime()
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '11',
            'DiasDesde'     => 'Lunes',
            'DiasHasta'     => 'Domingo',
            'HorasDesde'    => '06:00 AM',
            'HorasHasta'    => '07:00 PM',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => '',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => '',
            'PuestoOfrecido'=> 'Analista progamador',
            'Enfoque'       => 'C',
            'Estado'        => 'Rechazado',
            'updated_at'    => '2019/01/05',
            'created_at'        => new DateTime()
          ]);
    }
}
