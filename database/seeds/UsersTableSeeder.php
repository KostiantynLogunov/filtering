<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();  //видаляє все з таб Юзерів при кожном php artisan db:seed
        \App\UserInfo::truncate();

        factory(User::class, 100)->create()->each(function ($user) {
            factory(\App\UserInfo::class)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
