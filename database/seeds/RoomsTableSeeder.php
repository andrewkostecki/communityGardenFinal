<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'name' => 'Living Room',
            'systemID' => 2,
            'comments' => '4 large windows with natural light',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('rooms')->insert([
            'name' => 'Kitchen',
            'systemID' => 2,
            'comments' => '1 large wide window - natural light',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
