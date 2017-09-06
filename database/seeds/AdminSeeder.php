<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('admins')->insert([
            [       
                'id' => 1,
                'first_name' => 'Super',
                'last_name' => 'Administrador',
                'email' => 'super@admin.com',
                'username' => 'sudoadmin',
                'usercode' => 00000000,
                'password' => bcrypt('15431543'),
                'phone' => '0',
                'location' => null,
                'address' => null,
                'description' => 'Usuario super administrador',
                'gender' => 0,
                'role' => 999999,
                'status' => 1,
                'remember_token' => str_random(10),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ]
        ]);
    }
}
