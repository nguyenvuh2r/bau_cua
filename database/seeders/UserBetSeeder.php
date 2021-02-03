<?php

namespace Database\Seeders;

use App\Models\UserBet;
use Illuminate\Database\Seeder;

class UserBetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserBet::create([
            'user_id' => "1",
            'coin' => "10",
            'dice_value' => "0"
        ]);

        UserBet::create([
            'user_id' => "2",
            'coin' => "100",
            'dice_value' => "1"
        ]);

        UserBet::create([
            'user_id' => "3",
            'coin' => "1000",
            'dice_value' => "3"
        ]);

        UserBet::create([
            'user_id' => "3",
            'coin' => "5000",
            'dice_value' => "4"
        ]);
    }
}
