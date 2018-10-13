<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Message::class, function (Faker $faker) {
    return [
        'subject'   =>  $faker->text,
        'user_id'   =>  2,
    ];
});
