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
            'titulo' => '¿Que tengo que llevar?',
            'descripcion' => 'Que tengo que llevar para anotarme a la carrera de la Universidad',
            'orden' => 5,
            'id_tramite' => 1
        ));
    }
}
