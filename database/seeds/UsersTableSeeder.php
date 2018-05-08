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
            'name' => 'Dave Bachor',
            'systemID' => 1,
            'email' => 'dave@dave.com',
            'imageFileName' => '/img/default.png',
            'password' => bcrypt('davedave'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Susan',
            'systemID' => 2,
            'email' => 'sue@sue.com',
            'imageFileName' => '/img/default.png',
            'password' => bcrypt('suesue'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
