<?php

use Illuminate\Database\Seeder;

class PostulacionPracticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        DB::table('postulaciones_practicas')->insert([ 
          'alumnoid'     => '1',
          'practicaid'     => '1',
          'fecha'    => '01-01-10',
          'estado'    => 'Pendiente'
        ]);

        DB::table('postulaciones_practicas')->insert([ 
        'alumnoid'     => '1',
        'practicaid'     => '2',
        'fecha'    => '01-01-10',
        'estado'    => 'Pendiente'
        ]);

        DB::table('postulaciones_practicas')->insert([ 
          'alumnoid'     => '7',
          'practicaid'     => '1',
          'fecha'    => '01-01-10',
          'estado'    => 'Pendiente'
        ]); 

        DB::table('postulaciones_practicas')->insert([ 
          'alumnoid'     => '8',
          'practicaid'     => '1',
          'fecha'    => '01-01-10',
          'estado'    => 'Pendiente'
        ]); 

        DB::table('postulaciones_practicas')->insert([ 
          'alumnoid'     => '7',
          'practicaid'     => '14',
          'fecha'    => '01-01-10',
          'estado'    => 'Pendiente'
        ]); 
        DB::table('postulaciones_practicas')->insert([ 
          'alumnoid'     => '8',
          'practicaid'     => '15',
          'fecha'    => '01-01-10',
          'estado'    => 'Pendiente'
        ]); 
    }
}
