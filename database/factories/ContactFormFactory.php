<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// use App\Model;
use App\Models\ContactForm;
use Faker\Generator as Faker;

// $factory->define(Model::class, function (Faker $faker) {
$factory->define(ContactForm::class, function (Faker $faker) {
    return [
        'your_name' => $faker->name,
        'email' => $faker->unique()->email,
        'like_dog' => $faker->name,
    ];
});
