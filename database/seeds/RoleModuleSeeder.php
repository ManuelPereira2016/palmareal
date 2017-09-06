<?php

use Illuminate\Database\Seeder;

class RoleModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles_modules')->insert([
            /************ Super Administrador ************/
            [       
                'fk_id_role' => 999999,
                'fk_id_module' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'fk_id_role' => 999999,
                'fk_id_module' => 2,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'fk_id_role' => 999999,
                'fk_id_module' => 3,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'fk_id_role' => 999999,
                'fk_id_module' => 4,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'fk_id_role' => 999999,
                'fk_id_module' => 5,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ], 
            [       
                'fk_id_role' => 999999,
                'fk_id_module' => 6,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'fk_id_role' => 999999,
                'fk_id_module' => 7,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            /************ Web Master  ************/
            [       
                'fk_id_role' => 3,
                'fk_id_module' => 2,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'fk_id_role' => 3,
                'fk_id_module' => 3,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'fk_id_role' => 3,
                'fk_id_module' => 4,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'fk_id_role' => 3,
                'fk_id_module' => 5,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ], 
            [       
                'fk_id_role' => 3,
                'fk_id_module' => 6,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'fk_id_role' => 3,
                'fk_id_module' => 7,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            /************ Moderador  ************/
            [       
                'fk_id_role' => 2,
                'fk_id_module' => 4,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [       
                'fk_id_role' => 2,
                'fk_id_module' => 5,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ], 
            [       
                'fk_id_role' => 2,
                'fk_id_module' => 6,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            /************ Editor  ************/
            [       
                'fk_id_role' => 1,
                'fk_id_module' => 5,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
        ]);
    }
}
