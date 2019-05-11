<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create(array(
            'contenido' => 'Fotocopia del DNI',
            'id_lista' => 1
        ));
        Item::create(array(
            'contenido' => 'Fotocopia Titulo Secundario',
            'id_lista' => 1
        ));
        Item::create(array(
            'contenido' => 'Foto Carnet',
            'id_lista' => 1
        ));

        Item::create(array(
            'contenido' => 'Regularidad',
            'id_lista' => 2
        ));

        Item::create(array(
            'contenido' => 'Tener la cursada aprobada (Para rendir regular)',
            'id_lista' => 3
        ));
        Item::create(array(
            'contenido' => 'Estudiar!',
            'id_lista' => 3
        ));
    }
}
