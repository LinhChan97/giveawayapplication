<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\V1\User;
use App\Models\V1\Role;
use App\Models\V1\Category;
use App\Models\V1\Event;
use App\Models\V1\Item;
use App\Models\V1\Cause;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->unique()->username,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'address' => $faker->address,
        'phone_number' => $faker->phoneNumber,
        'avatar' => $faker->imageUrl,
    ];
});
$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
$factory->define(Cause::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => $faker->imageUrl,
        'description' => $faker->text
    ];
});
$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => $faker->imageUrl,
        'description' => $faker->text
    ];
});
$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category_id' => $faker->numberBetween(1,8),
        'description' => $faker->text,
        'text' => $faker->text,
        'price' => $faker->randomFloat(2,1,100),
        'avatar' => $faker->imageUrl,
    ];
});
$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => $faker->numberBetween(11,20),
        'cause_id' => $faker->numberBetween(1,8),
        'location' => $faker->address,
        'avatar' => $faker->imageUrl,
        'description' => $faker->text,
        'text' => $faker->text,
        'goal_item' => $faker->numberBetween(1,100000),
        'start_date' => $faker->dateTimeBetween('2018-01-01', '2019-01-01'),
        'end_date' => $faker->dateTimeBetween('2019-02-01', '2020-01-01')
    ];
});