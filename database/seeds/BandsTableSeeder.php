<?php

use Illuminate\Database\Seeder;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bands')->insert([
            'name' => 'Bloodgood',
            'start_date' => '1984',
            'website' => 'http://www.bloodgoodband.com',
            'still_active' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('bands')->insert([
            'name' => 'Theocracy',
            'start_date' => '2002',
            'website' => 'http://www.theocracymusic.com',
            'still_active' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('bands')->insert([
            'name' => 'Petra',
            'start_date' => '1972',
            'website' => 'http://www.petraband.com',
            'still_active' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
