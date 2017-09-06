<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   	public function run()
    {              
        $this->call(BannerSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(CharacteristicSeeder::class);
        $this->call(ProximitySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(RoleModuleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(MapSeeder::class);
        Model::unguard();
            factory('PalmaReal\Admin', 30)->create();
            factory('PalmaReal\Property', 20)->create();
            factory('PalmaReal\Message', 40)->create();
        Model::reguard();
    }
}
