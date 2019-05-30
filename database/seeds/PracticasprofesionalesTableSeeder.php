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
            'EmpresaId'     => '1',
            'DiasDesde'     => 'Martes',
            'DiasHasta'     => 'Viernes',
            'HorasDesde'    => '08:30',
            'HorasHasta'    => '16:30',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requqerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Junior en programacion',
            'Enfoque'       => 'Python',
            'Estado'        => 'Pendiente',
            'updated_at'    => '2019/01/30'
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '2',
            'DiasDesde'     => 'Lunes',
            'DiasHasta'     => 'Jueves',
            'HorasDesde'    => '09:00',
            'HorasHasta'    => '17:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requqerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Junior en programacion',
            'Enfoque'       => 'Typescript,Angular',
            'Estado'        => 'Aprobado',
            'updated_at'    => '2019/02/05'
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '3',
            'DiasDesde'     => 'Lunes',
            'DiasHasta'     => 'Miercoles',
            'HorasDesde'    => '08:00',
            'HorasHasta'    => '17:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requqerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Junior en programacion',
            'Enfoque'       => 'Ruby BackEnd',
            'Estado'        => 'Aprobado',
            'updated_at'    => '2019/03/03'
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '4',
            'DiasDesde'     => 'Lunes',
            'DiasHasta'     => 'Domingo',
            'HorasDesde'    => '06:00',
            'HorasHasta'    => '19:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => '',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => '',
            'PuestoOfrecido'=> '',
            'Enfoque'       => 'C',
            'Estado'        => 'Rechazado',
            'updated_at'    => '2019/01/05'
          ]);
    }
}
