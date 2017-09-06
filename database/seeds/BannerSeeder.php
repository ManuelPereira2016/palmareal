<?php

use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
        	[
                'page' => 1,
	        	'name' => 'Mire nuestras construcciones',
	        	'description' => 'Proin eget tortor risus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.',
	        	'link' => 'construcciones',
	        	'image' => '1.jpg',
	        	'created_at' => date('Y-m-d H:i:s'),
	        	'updated_at' => date('Y-m-d H:i:s')
        	],
        	[
                'page' => 1,
        		'name' => 'Nuestra Inmobiliaria',
	        	'description' => 'Proin eget tortor risus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.',
	        	'link' => 'inmobiliaria',
	        	'image' => '2.jpg',
	        	'created_at' => date('Y-m-d H:i:s'),
	        	'updated_at' => date('Y-m-d H:i:s')
        	]
        ]);
    }
}
