<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(PalmaReal\Admin::class, function (Faker\Generator $faker) {
    static $password;
    $first_name = $faker->firstName;
    $username = $first_name.str_random(3);
    return [
	    'first_name' => $first_name,
	    'last_name' => $faker->lastName,
	    'email' => $faker->unique()->safeEmail,
	    'username' => $username,
	    'usercode' => mt_rand(00000000,99999999),
	    'password' => bcrypt('15431543'),
	    'phone' => $faker->e164PhoneNumber,
	    'location' => $faker->country,
	    'address' => $faker->address,
	    'description' => $faker->text(150),
	    'gender' => $faker->randomElement([0,1]),
	    'status' => $faker->randomElement([0,1]),
        'role' => $faker->randomElement([1,2,3]),
	    'created_at' => date('Y-m-d H:m:s'),
	    'updated_at' => date('Y-m-d H:m:s'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(PalmaReal\Message::class, function (Faker\Generator $faker) {    
    return [
    	'subject' => $faker->text(80), 
        'message' => $faker->realText(300),
        'property' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]), 
        'name' => $faker->name(), 
        'email' => $faker->email, 
        'phone' => $faker->e164PhoneNumber, 
    	'status' => $faker->randomElement([0,1]),
	    'created_at' => date('Y-m-d H:m:s'),
	    'updated_at' => date('Y-m-d H:m:s')
    ];
});

$factory->define(PalmaReal\Property::class, function (Faker\Generator $faker) {    
    return [
    	'name' => $faker->text(50), 
    	'description' => $faker->realText(300), 
    	'location' => $faker->address, 
    	'modality' => $faker->randomElement([1,2]),  
    	'code' => mt_rand(00000000,99999999), 
    	'proximities' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]),
    	'characteristics' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16]),  
    	'admin' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]), 
    	'type' => $faker->randomElement([1,2]), 
    	'size' => $faker->randomNumber(), 
    	'rooms' => $faker->randomDigit , 
    	'bathrooms' => $faker->randomDigit , 
    	'garages' => $faker ->randomDigit , 
    	'antiquity' => $faker->randomDigit , 
    	'price' => $faker->randomFloat(0,9999999), 
    	'views' => $faker->randomDigit , 
    	'status' => $faker->randomElement([0,1]), 
    ];
});


            