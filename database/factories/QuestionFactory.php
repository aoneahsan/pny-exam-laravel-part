<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

use App\User;
use App\Models\Quiz;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'user_id' => function() {
        	return User::all()->random();
        },
        'quiz_id' => function() {
        	return Quiz::all()->random();
        },
        'question_text' => $faker->text(40),
        'option_a' => $faker->text(6),
        'option_b' => $faker->text(7),
        'option_c' => $faker->text(8),
        'option_d' => $faker->text(9),
        'correct_answer' => function() {
            $arr = ['a', 'b', 'c', 'd'];
            return $arr[array_rand($arr)];
        }
    ];
});
