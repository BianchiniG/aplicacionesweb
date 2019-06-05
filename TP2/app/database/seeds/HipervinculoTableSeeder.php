<?php

use Illuminate\Database\Seeder;
use App\Hipervinculo;

class HipervinculoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hipervinculo::create(array(
            'titulo' => 'Links de interes',
            'id_tramite' => 1
        ));
    }
}
