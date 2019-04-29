<?php

use Illuminate\Database\Seeder;
use App\Tramite;

class TramiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tramite::create(array(
            'titulo' => '',
            'descripcion' => ''
        ));
    }
}
