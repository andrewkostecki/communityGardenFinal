<?php

use Illuminate\Database\Seeder;

class PlantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plants')->insert([
            'name' => 'carrotty',
            'systemID' => 2,
            'roomID' => 2,
            'planttypeID' => 1,
            'planterID' => 1,
            'soiltypeID' => 1,
            'imageFileName' => '/img/default.png',
            'comments' => 'planted carrots to test how they grow',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('plants')->insert([
            'name' => 'greeny',
            'systemID' => 2,
            'roomID' => 2,
            'planttypeID' => 2,
            'planterID' => 2,
            'soiltypeID' => 2,
            'imageFileName' => '/img/default.png',
            'comments' => 'planted green beans -yeah',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
