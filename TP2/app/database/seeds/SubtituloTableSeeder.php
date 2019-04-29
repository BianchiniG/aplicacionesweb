<?php

use Illuminate\Database\Seeder;
use App\Subtitulo;

class SubtituloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subtitulo::create(array(
            'nombre' => '',
            'contenido' => '',
            'orden' => '',
            'id_tramite' => ''
        ));
    }
}
