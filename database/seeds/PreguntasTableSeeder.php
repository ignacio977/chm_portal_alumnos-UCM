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
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Facilidad para Adaptarse al nuevo entorno',
            'TipoPregunta'      => 'Empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Puntualidad en el horario',
            'TipoPregunta'      => 'Empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Grado de cumplimiento de las funciones asignadas',
            'TipoPregunta'      => 'Empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Grado de satisfacción por trabajo realizado',
            'TipoPregunta'      => 'Empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Grado de cumplimiento de Plazos Estipulados',
            'TipoPregunta'      => 'Empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Interés por el trabajo',
            'TipoPregunta'      => 'Empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Disposición al trabajo en equipo',
            'TipoPregunta'      => 'Empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Grado de iniciativa propia',
            'TipoPregunta'      => 'Empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Capacidad para expresar ideas propias',
            'TipoPregunta'      => 'Empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Conocimientos técnicos profesionales demostrados',
            'TipoPregunta'      => 'Empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Utilizar el conocimiento experimental y aplicado de la matemática, física y estadística en la resolución de problemas ingenieriles.',
            'TipoPregunta'      => 'Empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Analizar y sintetizar problemas para su resolución algorítmica, fundamentándose en los distintos paradigmas de programación',
            'TipoPregunta'      => 'Empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Diseñar, implementar y mantener productos de software y sus componentes, siguiendo estándares y criterios definidos en el área de la Ingeniería de Software.',
            'TipoPregunta'      => 'Empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Diseñar, implementar y mantener redes de computadores siguiendo estándares internacionales',
            'TipoPregunta'      => 'Empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);
        DB::table('preguntas')->insert([ 
            'ContenidoPregunta' => 'Formular y administrar proyectos informáticos de acuerdo a las necesidades de la organización. Además, integra el desarrollo de las capacidades definidas por la Universidad Católica del Maule en el marco de la formación general e incorpora aquellas que aportan al sello institucional desde una perspectiva teológica y ética',
            'TipoPregunta'      => 'Empresa',
            'created_at'        => new DateTime(),
            'updated_at'        => new DateTime()
        ]);

    }
}
