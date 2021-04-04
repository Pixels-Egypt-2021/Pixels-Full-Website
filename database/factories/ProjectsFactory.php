<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Projects::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'title' => $faker->text(20),
        'description' => $faker->text(100),
        'components' => $faker->text(100),
        'components_imgs' => $faker->text(100),
        'design_imgs' => $faker->text(100),
        'pcb_imgs' => $faker->text(100),
        'steps' => $faker->text(100),
        'code' => $faker->text(100),
        'link' => $faker->text(100),
        'project_imgs' => $faker->imageUrl(10),
        'video_link' => $faker->text(10)
    ];
});
