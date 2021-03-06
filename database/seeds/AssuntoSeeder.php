<?php

use App\Assunto;
use Illuminate\Database\Seeder;

class AssuntoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pais = factory(Assunto::class, rand(3, 5))->create();

        for ($a = 0; $a < count($pais); $a++) {
            $filhos = factory(Assunto::class, rand(1, 3))->create();

            for ($b = 0; $b < count($filhos); $b++) {
                $netos = factory(Assunto::class, rand(1, 3))->create();

                for ($c = 0; $c < count($netos); $c++) {
                   $filhos[$b]->assuntos()->save($netos[$c]);
                }

                $pais[$a]->assuntos()->save($filhos[$b]);
            }
        }
    }
}
