
<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use egber\Press\Post;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(Post::class, function (Faker $faker) {
    return [
        'slug' => str_slug($faker->sentence),
        'titulo' => $faker->unique()->sentence,
        'descripcion' => $faker->sentence(3),
        'date' => now(),
        'extra' => json_encode(['author'=>'jorge Mendes']), // password
        'body' =>  $faker->sentence(25),
    ];

});
