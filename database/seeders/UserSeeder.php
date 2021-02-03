<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'vu',
            'email' => 'vu@gmail.com',
            'password' => bcrypt('123456'),
            'coin' => '1000000000',
            'total_game' => '0'
        ]);

        User::create([
            'name' => 'an',
            'email' => 'an@gmail.com',
            'password' => bcrypt('123456'),
            'coin' => '1000000000',
            'total_game' => '0'
        ]);

        User::create([
            'name' => 'dat',
            'email' => 'dat@gmail.com',
            'password' => bcrypt('123456'),
            'coin' => '1000000000',
            'total_game' => '0'
        ]);
    }
}
