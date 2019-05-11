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
            'orden' => 2,
            'id_tramite' => 1
        ));
        Lista::create(array(
            'titulo' => '¿Que datos tengo que tener?',
            'descripcion' => 'Que datos tengo que tener a mano para hacer el certificado',
            'orden' => 2,
            'id_tramite' => 2
        ));
        Lista::create(array(
            'titulo' => '¿Que tengo que llevar?',
            'descripcion' => 'Que tengo que llevar para anotarme al final',
            'orden' => 4,
            'id_tramite' => 3
        ));
    }
}
