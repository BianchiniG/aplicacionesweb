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
            'nombre' => '',
            'contenido' => '',
            'orden' => '',
            'id_tramite' => ''
        ));
    }
}
