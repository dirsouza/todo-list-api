<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TodoList;
use Faker\Generator as Faker;

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

$factory->define(TodoList::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->realText(rand(20, 50)),
        'description' => $faker->text(rand(20, 100)),
        'archived' => $faker->randomElement([0, 1]),
        'completed' => $faker->randomElement([0, 1]),
    ];
});
