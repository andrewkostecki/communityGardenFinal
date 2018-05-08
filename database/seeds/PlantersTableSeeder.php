<?php

use Illuminate\Database\Seeder;

class PlantersTableSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planters')->insert([
            'name' => 'Green Trough',
            'systemID' => 2,
            'comments' => 'large deck shelf',
            'created_at' => now(),
            'updated_at' => now(),
            
        ]);
        DB::table('planters')->insert([
            'name' => 'Large Tan Pot',
            'systemID' => 2,
            'comments' => 'very large pot',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
