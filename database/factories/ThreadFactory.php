<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Thread;
use Faker\Generator as Faker;

$factory->define(App\Thread::class, function (Faker $faker) {
    return [
        "title"=>"スレ",
    ];
});
