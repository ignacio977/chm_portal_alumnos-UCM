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
          'estado'    => 'Aceptada',
          'inspeccionado'     => "2019-01-01 00:00:00",
          'created_at'        => new DateTime(),
          'updated_at'        => new DateTime()
        ]);

        DB::table('postulaciones_practicas')->insert([ 
          'id'     => '2',
          'alumnoid'     => '1',
          'practicaid'     => '2',
          'fecha'    => '01-01-10',
          'estado'    => 'Pendiente',
          'inspeccionado'     => "2019-01-01 00:00:00",
          'created_at'        => new DateTime(),
          'updated_at'        => new DateTime()
        ]);

        DB::table('postulaciones_practicas')->insert([ 
          'id'     => '3',
          'alumnoid'     => '6',
          'practicaid'     => '1',
          'fecha'    => '01-01-10',
          'estado'    => 'Pendiente',
          'inspeccionado'     => "2019-01-01 00:00:00",
          'created_at'        => new DateTime(),
          'updated_at'        => new DateTime()
        ]); 

        DB::table('postulaciones_practicas')->insert([ 
          'id'     => '4',
          'alumnoid'     => '7',
          'practicaid'     => '1',
          'fecha'    => '01-01-10',
          'estado'    => 'Pendiente',
          'inspeccionado'     => "2019-01-01 00:00:00",
          'created_at'        => new DateTime(),
          'updated_at'        => new DateTime()
        ]); 

        DB::table('postulaciones_practicas')->insert([ 
          'id'     => '5',
          'alumnoid'     => '6',
          'practicaid'     => '14',
          'fecha'    => '01-01-10',
          'estado'    => 'Pendiente',
          'inspeccionado'     => "2019-01-01 00:00:00",
          'created_at'        => new DateTime(),
          'updated_at'        => new DateTime()
        ]); 
        DB::table('postulaciones_practicas')->insert([ 
          'id'     => '6',
          'alumnoid'     => '7',
          'practicaid'     => '15',
          'fecha'    => '01-01-10',
          'estado'    => 'Pendiente',
          'inspeccionado'     => "2019-01-01 00:00:00",
          'created_at'        => new DateTime(),
          'updated_at'        => new DateTime()
        ]); 
    }
}
