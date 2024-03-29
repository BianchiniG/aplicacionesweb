<?php

use Illuminate\Database\Seeder;

// Requerimos los Seeders
require_once "UsersTableSeeder.php";
require_once "ItemsTableSeeder.php";
require_once "ListaTableSeeder.php";
require_once "TextoTableSeeder.php";
require_once "TramiteTableSeeder.php";
require_once "HipervinculoTableSeeder.php";
require_once "LinksTableSeeder.php";

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TramiteTableSeeder::class);
        $this->call(ListaTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(TextoTableSeeder::class);
        $this->call(HipervinculoTableSeeder::class);
        $this->call(LinksTableSeeder::class);
        // $this->call(AdjuntoTableSeeder::class);
    }
}
