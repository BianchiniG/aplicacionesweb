<?php

use Illuminate\Database\Seeder;
use App\Adjunto;

class AdjuntoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Adjunto::create(array(
            'titulo' => 'Adjunto',
            'path' => 'Archivo.pdf',
            'id_tramite' => 1
        ));
    }
}
