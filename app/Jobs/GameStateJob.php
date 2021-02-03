<?php

namespace App\Jobs;

use App\Models\GameState;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GameStateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        while(true)
        {
            $game_sate = GameState::find(1);
            $game_sate->state = 'bet';
            $game_sate->save();
            sleep(15); //Bet take 15s

            $game_sate = GameState::find(1);
            $game_sate->state = 'roll';
            $game_sate->save();
            sleep(10); //Bet take 10s

            $game_sate = GameState::find(1);
            $game_sate->state = 'result';
            $game_sate->save();
            sleep(5); //Bet take 5s
        }
    }
}
