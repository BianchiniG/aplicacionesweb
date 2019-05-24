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
            'titulo' => 'Hipervinculo',
            'url' => 'https://worldofwarcraft.com/es-es/game/pvp/leaderboards/3v3',
            'id_tramite' => 1
        ));
    }
}
