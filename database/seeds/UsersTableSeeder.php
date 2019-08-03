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
        App\User::create([
            'name'=>'admin',
            'password'=>bcrypt('admin'),
            'email'=>'admin@gmail.com',
            'avatar'=>asset('avatars/avatar.png'),
            'admin'=>1
        ]);

        App\User::create([
            'name'=>'ahmed',
            'password'=>bcrypt('ahmed'),
            'email'=>'ahmed@gmail.com',
            'avatar'=>asset('avatars/avatar2.png'),
            'admin'=>0
        ]);

    }
}
