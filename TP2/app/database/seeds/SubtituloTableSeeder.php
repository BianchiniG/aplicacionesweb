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
            'contenido' => '¿Donde?',
            'orden' => 2,
            'id_tramite' => 1
        ));
        Subtitulo::create(array(
            'contenido' => '¿Que tengo que llevar?',
            'orden' => 4,
            'id_tramite' => 1
        ));
        Subtitulo::create(array(
            'contenido' => '¿Hasta cuando tengo tiempo?',
            'orden' => 6,
            'id_tramite' => 1
        ));
    }
}
