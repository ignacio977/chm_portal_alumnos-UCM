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
            'id'     => '1',
            'alumnoid'     => '1',
            'practicaid'     => '1',
            'fecha'    => '01-01-10',
            'estado'    => 'Pendiente'
          ]);

        DB::table('postulaciones_practicas')->insert([ 
        'id'     => '2',
        'alumnoid'     => '1',
        'practicaid'     => '2',
        'fecha'    => '01-01-10',
        'estado'    => 'Pendiente'
        ]);

        DB::table('postulaciones_practicas')->insert([ 
            'id'     => '3',
            'alumnoid'     => '1',
            'practicaid'     => '3',
            'fecha'    => '01-01-10',
            'estado'    => 'Pendiente'
          ]); 
    }
}
