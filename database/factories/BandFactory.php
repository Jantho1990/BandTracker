<?php

use Faker\Generator as Faker;

$factory->define(App\Band::class, function (Faker $faker) {
    return [
        'name' => 'The Stand-Ins',
        'start_date' => '1999',
        'website' => 'http://www.thestandins.com',
        'still_active' => true
    ];
});

$factory->state(App\Band::class, 'inactive', function ($faker) {
    return [
        'still_active' => false
    ];
});
