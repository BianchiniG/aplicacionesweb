<?php

use App\Link;

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Link::create(array(
            'descripcion' => 'Facultad de Ingenieria',
            'url' => 'http://www.ing.unp.edu.ar/',
            'id_hipervinculo' => 1
        ));
        Link::create(array(
            'descripcion' => 'Departamento de Informatica Trelew',
            'url' => 'http://www.dit.ing.unp.edu.ar',
            'id_hipervinculo' => 1
        ));
    }
}
