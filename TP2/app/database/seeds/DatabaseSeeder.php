<?php

use Illuminate\Database\Seeder;

// Requerimos los Seeders
require_once "UsersTableSeeder.php";
require_once "ItemsTableSeeder.php";
require_once "ListaTableSeeder.php";
require_once "TextoTableSeeder.php";
require_once "SubtituloTableSeeder.php";
require_once "TramiteTableSeeder.php";

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(ListaTableSeeder::class);
        $this->call(TextoTableSeeder::class);
        $this->call(SubtituloTableSeeder::class);
        $this->call(TramiteTableSeeder::class);
    }
}
