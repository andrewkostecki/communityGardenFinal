<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert([
            'systemID' => 2,
            'userID' => 2,
            'entity' => 'plant',
            'entityID' => 1,
            'comments' => 'Initial planting - still small',
            'imageFileName' => '/img/default.png',
            'share' => 'Yes',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('notes')->insert([
            'systemID' => 2,
            'userID' => 2,
            'entity' => 'plant',
            'entityID' => 1,
            'comments' => 'growing stronger today  - could be due to nice eahther',
            'imageFileName' => '/img/default.png',
            'share' => 'Yes',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
