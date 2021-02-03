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
        for($i = 1; $i <= 20; $i++)
        {
            $user_id = rand(1, 3);
            $coin = rand(10, 500);
            $dice_value = rand(0, 5);
            UserBet::create([
                'user_id' => $user_id,
                'coin' => $coin,
                'dice_value' => $dice_value
            ]);
        }
    }
}
