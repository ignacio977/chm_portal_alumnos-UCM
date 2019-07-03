<?php

use Illuminate\Database\Seeder;

class PreguntasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'La empresa facilita algún tipo de ayuda para tu ingreso a la misma',
            'TipoPregunta'      => 'Practicante',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Realicé sólo las operaciones descritas en la postulación de la practica',
            'TipoPregunta'      => 'Practicante',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'La empresa tiene un grato ambiente laboral',
            'TipoPregunta'      => 'Practicante',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Podía realizar consultas a mis compañeros de trabajo si lo requería',
            'TipoPregunta'      => 'Practicante',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Me siento satisfecho con la actividad realizada en la empresa',
            'TipoPregunta'      => 'Practicante',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'La empresa era comprensiva con mis capacidades',
            'TipoPregunta'      => 'Practicante',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'La empresa o supervisor entrega información sobre mi actividad y su buena o mala impresion de mi actividad',
            'TipoPregunta'      => 'Practicante',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Mi lider de trabajo aclara mis actividades de forma y tiempo correcta',
            'TipoPregunta'      => 'Practicante',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Obtuve conocimientos sobre trabajo que servirán para mi futuro laboral',
            'TipoPregunta'      => 'Practicante',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Aconsejaría a mis compañeros a realizar practica en esta empresa',
            'TipoPregunta'      => 'Practicante',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
    }
}
