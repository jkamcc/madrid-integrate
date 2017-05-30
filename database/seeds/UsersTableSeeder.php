<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'soporte.sistemas@amigosmira.es',
            'password' => bcrypt('admin')
        ]);

        DB::table('users')->insert([
            'name' => 'gestor1',
            'email' => 'msi1@amigosmira.es',
            'password' => bcrypt('test')
        ]);

        DB::table('users')->insert([
            'name' => 'gestor2',
            'email' => 'msi2@amigosmira.es',
            'password' => bcrypt('test')
        ]);

        DB::table('users')->insert([
            'name' => 'gestor3',
            'email' => 'msi3@amigosmira.es',
            'password' => bcrypt('test')
        ]);

        /*
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        */
    }
}
