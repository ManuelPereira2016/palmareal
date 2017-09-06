<?php

use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([            
            [       
                'id' => '1',
                'name' => 'logs',
                'description' => 'Logs del sistema',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'id' => '2',
                'name' => 'historicos',
                'description' => 'Modulo de historial de acciones en el sistema administrativo',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'id' => '3',
                'name' => 'usuarios',
                'description' => 'Modulo de gestion de usuarios administradores',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'id' => '4',
                'name' => 'paginas',
                'description' => 'Modulo de gestion de paginas del sitio web',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'id' => '5',
                'name' => 'propiedades',
                'description' => 'Modulo para la gestion de propiedades inmobiliarias',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'id' => '6',
                'name' => 'mensajes',
                'description' => 'Modulo para ver los mensajes enviado por los clientes',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'id' => '7',
                'name' => 'bannes',
                'description' => 'Modulo para la gestion de banners',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
        ]);
    }
}
