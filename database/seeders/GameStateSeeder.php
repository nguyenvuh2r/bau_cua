<?php

namespace Database\Seeders;

use App\Models\GameState;
use Illuminate\Database\Seeder;

class GameStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = new GameState();
        $state->state = 'stop';
        $state->save();
    }
}
