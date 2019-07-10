<?php

use Illuminate\Database\Seeder;
use App\EnCursoPractica;

class EnCursoPracticasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new EnCursoPractica;
        $a->alumnoid = 1;
        $a->practicaid = 1;
        $a->fecha = "01-01-01";
        $a->postulacionid = 1;
        $a->nota1 = 1.2;
        $a->nota2 = 1.3;
        $a->nota3 = 1.3;
        $a->save();

        $a = new EnCursoPractica;
        $a->alumnoid = 6;
        $a->practicaid = 2;
        $a->fecha = "01-01-01";
        $a->postulacionid = 2;
        $a->nota1 = 1.2;
        $a->nota2 = 1.3;
        $a->nota3 = 1.3;
        $a->save();
    }
}
