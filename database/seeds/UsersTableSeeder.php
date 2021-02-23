<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Администратор',
            'email' => 'ignik5@yandex.ru',
            'password' => bcrypt('ignik9977'),
            'is_admin' => 1,
        ]);
    }
}