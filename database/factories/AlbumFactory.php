<?php

use Faker\Generator as Faker;

$factory->define(App\Album::class, function (Faker $faker) {
    return [
        'band_id' => 1,
        'name' => 'Filler Album',
        'recorded_date' => '1998',
        'release_date' => '1999',
        'number_of_tracks' => 13,
        'label' => 'Money Grubbing Records',
        'producer' => 'Ivana Lotticache',
        'genre' => 'Pop Grunge',
    ];
});
