<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        factory(App\User::class, 50)->create()->each(function ($user) {
            $user->profile()->create(['title'=>$user->username]);
        });

    }
}
