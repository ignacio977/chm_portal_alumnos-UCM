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
            'EmpresaId'     => '0',
            'DiasDesde'     => '2019-01-01',
            'DiasHasta'     => '2019-07-01',
            'HorasDesde'    => '08:30',
            'HorasHasta'    => '16:30',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requqerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Junior en programacion',
            'Enfoque'       => 'Python',
            'Estado'        => 'Pendiente'
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '1',
            'DiasDesde'     => '2019-02-01',
            'DiasHasta'     => '2019-08-01',
            'HorasDesde'    => '09:00',
            'HorasHasta'    => '17:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requqerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Junior en programacion',
            'Enfoque'       => 'Typescript,Angular',
            'Estado'        => 'Aprobado'
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '2',
            'DiasDesde'     => '2019-03-01',
            'DiasHasta'     => '2019-08-01',
            'HorasDesde'    => '08:00',
            'HorasHasta'    => '17:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => 'Toma de Requqerimientos',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => 'Soporte',
            'PuestoOfrecido'=> 'Junior en programacion',
            'Enfoque'       => 'Ruby BackEnd',
            'Estado'        => 'Aprobado'
          ]);
          DB::table('practicasprofesionales')->insert([ 
            'EmpresaId'     => '3',
            'DiasDesde'     => '2019-01-01',
            'DiasHasta'     => '2019-12-25',
            'HorasDesde'    => '06:00',
            'HorasHasta'    => '19:00',
            'Actividad1'    => 'Desarrollo',
            'Actividad2'    => '',
            'Actividad3'    => 'Prueba de software',
            'Actividad4'    => '',
            'PuestoOfrecido'=> '',
            'Enfoque'       => 'C',
            'Estado'        => 'Rechazado'
          ]);
    }
}
