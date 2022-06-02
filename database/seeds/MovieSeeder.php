<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('movies')->insert([
                'title' => Str::random(10),
                'why' => Str::random(10),
                'description' => Str::random(20),
                'user_id'=>1,
                'seen'=>false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
