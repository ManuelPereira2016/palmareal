<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	DB::table('pages')->insert([
            [   
                'title' => 'inicio',
                'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                'description' => 'Texto de pagina de inicio',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'author' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [   
                'title' => 'construcciones',
                'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                'description' => 'Pagina para mostrar la descripcion de nuestras construcciones',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'author' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [   
                'title' => 'inmuebles',
                'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                'description' => 'Pagina para mostrar la descripcion de  inmuebles',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'author' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [   
                'title' => 'propiedad',
                'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                'description' => 'Pagina para mostrar la pripiedad seleccionada',
                'content' => '',
                'author' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [   
                'title' => 'corretaje',
                'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                'description' => 'Pagina para mostrar la descripcion de  corretaje',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'author' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [   
                'title' => 'contacto',
                'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                'description' => 'Pagina para mostrar la descripcion de contacto',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'author' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [   
                'title' => 'sobre nosotros',
                'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
                'description' => 'Descripcion sobre nosotros que se encuentra ene l pie de pagina',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'author' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
        ]);
    }
}
