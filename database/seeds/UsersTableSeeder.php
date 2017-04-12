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
            'email' => 'admin@amigosmira.es',
            'password' => bcrypt('admin')
        ]);

        DB::table('users')->insert([
            'name' => 'Coordinador',
            'email' => 'coordinador@amigosmira.es',
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
