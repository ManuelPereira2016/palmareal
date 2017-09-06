<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [       
                'id' => 1,
                'name' => 'editor',
                'description' => 'Encargado de crear y editar las propiedades dentro del sistema',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'id' => 2,
                'name' => 'moderador',
                'description' => 'Encargado de la gestion de contenido de las propiedades y de las paginas del website',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'id' => 3,
                'name' => 'web master',
                'description' => 'Encargado de la gestion de los usuarios, los e informacion del website',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'id' => 999999,
                'name' => 'super admnistrador',
                'description' => 'Rol con maximo nivel de privilegios a nivel de sistema',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ]
        ]);
    }
}
