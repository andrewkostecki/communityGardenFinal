<?php

use Illuminate\Database\Seeder;

class PlantTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plant_types')->insert([
            'name' => 'carrots',
            'systemID' => 2,
            'comments' => 'orange carrots - good for your vision',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('plant_types')->insert([
            'name' => 'green beans',
            'systemID' => 2,
            'comments' => 'green sring beans - good for your heart',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
