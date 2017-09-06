<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            ['name' => 'Casa', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')],
            ['name' => 'Apartamento', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')]
        ]);
    }
}
