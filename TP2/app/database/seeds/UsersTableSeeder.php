<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'name' => 'Administrador',
            'email' => 'admin@sistema.com',
            'password' => Hash::make('admin')
        ));
    }
}
