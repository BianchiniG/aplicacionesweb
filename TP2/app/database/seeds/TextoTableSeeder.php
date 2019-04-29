<?php

use Illuminate\Database\Seeder;
use App\Texto;

class TextoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Texto::create(array(
            'contenido' => 'En la uni :D',
            'orden' => 3,
            'id_tramite' => 1
        ));
        Texto::create(array(
            'contenido' => 'Fijate',
            'orden' => 7,
            'id_tramite' => 1
        ));
    }
}
