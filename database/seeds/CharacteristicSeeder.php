<?php

use Illuminate\Database\Seeder;

class CharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characteristics')->insert([
	      	[
	            'name' => 'Vigilancia Privada',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Lobby',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Parque infantil',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Cancha deportiva',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Piscina',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Sauna',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Terraza',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Salón de Fiestas',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Camineria',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Parrillera',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Lavanderia',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Ascensor',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Cerca electrica',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Jardines',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Internet / Wifi',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Patio',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	]
        ]);
    }
}
