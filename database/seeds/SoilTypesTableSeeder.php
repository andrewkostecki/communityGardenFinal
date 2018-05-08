<?php

use Illuminate\Database\Seeder;

class SoilTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('soil_types')->insert([
            'name' => 'Fertilizer A',
            'systemID' => 2,
            'comments' => 'name brand soil',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('soil_types')->insert([
            'name' => 'Dirt X',
            'systemID' => 2,
            'comments' => 'off-brand soil',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
