<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
            'name' => "Le Xuan Quang",
            'phone_number' => "0981711201",
            'email' => "quang12@gmail.com",
            'password' => Hash::make('123456'),
        ]);
    }
}
