<?php

use Illuminate\Database\Seeder;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maps')->insert([
        	'description' => 'Mapa principal del website',
        	'longitude' => '-122.0850503',
			'latitude' => '37.4219328'
        ]);
    }
}
