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
            'name' => 'Gabriel',
            'email' => 'gabrielspanu96@gmail.com',
            'password' => '$2y$10$/BOzvT2uzQIbN0U.i0XogO4iOqLr5y9bJqCL1/6dnRPCPBKdW8UoS',
        ]);
    }
}
