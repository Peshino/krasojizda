<?php

use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
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
        $json = File::get('database/data/users.json');
        $users = json_decode($json);
        foreach ($users as $user) {
            User::create(array(
                'id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'fullname' => $user->fullname,
                'nickname' => $user->nickname,
                'email' => $user->email,
                'password' => bcrypt('test'),
                'remember_token' => Str::random(10),
                'color_id' => $user->color_id
            ));
        }
    }
}
