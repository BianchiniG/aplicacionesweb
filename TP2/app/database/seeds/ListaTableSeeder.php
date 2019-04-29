<?php

use Illuminate\Database\Seeder;
use App\Lista;

class ListaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lista::create(array(
            'nombre' => '',
            'descripcion' => '',
            'orden' => '',
            'id_tramite' => ''
        ));
    }
}
