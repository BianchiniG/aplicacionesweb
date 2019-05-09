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
            'id_lista' => 2
        ));
        Item::create(array(
            'contenido' => 'Fotocopia Titulo Secundario',
            'id_lista' => 2
        ));
        Item::create(array(
            'contenido' => 'Foto Carnet',
            'id_lista' => 2
        ));
    }
}
