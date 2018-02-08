<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
    {
        $user = array(
            'username' => 'hogehoge',
            'password' => Hash::make('admin'),
            'email' => 'hoge@example.com',
            'photo' => 'hogehoge.png',
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()'),
        );

        DB::table('users')->insert($user);
    }

}
