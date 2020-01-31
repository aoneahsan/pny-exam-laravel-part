<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quiz;
use Faker\Generator as Faker;

use App\User;

$factory->define(Quiz::class, function (Faker $faker) {
    return [
        'user_id' => function() {
        	return User::all()->random();
        },
        'title' => $faker->text(10),
        'description' => $faker->text(100),
        'per_question_mark' => $faker->numberBetween(1,3),
        'quiz_time' => function() {
            $arr = ['10', '15', '20', '25'];
            return $arr[array_rand($arr)];
        },
        'quiz_price' => function() {
            $arr = ['100', '150', '200', '250'];
            return $arr[array_rand($arr)];
        },
        'show_answers' => function() {
            $arr = ['yes', 'no'];
            return $arr[array_rand($arr)];
        },
        'quiz_available' => 'yes',
        'passing_percentage' => '60'
    ];
});
