<?php

use Illuminate\Database\Seeder;

class ProximitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proximities')->insert([
	      	[
	            'name' => 'Hospital',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Clínica',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Transp. Puliblico',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Colegio',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Farmacia',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Licoreria',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Floristeria',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Supemercado',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Bodegón',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Almacen',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Metro',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Centro Comercial',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Tienda',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Universidad',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Plaza',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Parque',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Museo',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Cafeteria',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Terminal',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Aereopuerto',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Embajada',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Linea de Taxi',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Banco',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	],
	      	[
	            'name' => 'Panaderia',
	            'created_at' => date('Y-m-d H:m:s'),
	            'updated_at' => date('Y-m-d H:m:s')
	      	]
        ]);
    }
}
