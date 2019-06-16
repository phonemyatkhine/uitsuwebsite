<?php

use Faker\Generator as Faker;

$factory->define(App\Students::class, function (Faker $faker) {
    return [
        'id' => $faker->randomNumber(5,true),
        'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
    ];
});
