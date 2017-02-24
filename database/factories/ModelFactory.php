<?php


$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Models\Articles::class, function (Faker\Generator $faker) {
	return [
		'user_id' => 1,
		'title' => $faker->name,
		'description' => $faker->realText(200),
		'image' => "images/blog/no-image.png",
		'text' => $faker->realText(4000),
		'status' => 'Published',
		'category_id' => rand(1,3),
	];
});