<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserBet;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function roll()
    {
        //$results = [rand(0, 5), rand(0, 5), rand(0, 5)];
        $results = array(0,3,0);
        //Sort user de tranh query mot user nhieu lan
        $bets = UserBet::orderBy('id', 'DESC')->get();
        $user = null;
        foreach($bets as $bet)
        {
            if($user)
            {
                //Neu user hien tai khac da co roi ne
                if($user->id != $bet->user_id)
                {
                    $user = User::find($bet->user_id);
                }
            }
            else
            {
                $user = User::find($bet->user_id);
            }

            $coin = $user->coin;
            //Neu gia tri bet cua user khong ton tai trong result
            if(!in_array($bet->dice_value, $results))
            {
                //Tru tien luon
                $coin = $coin - $bet->coin;
            }
            else
            {
                //Duyet qua tung result de tinh tien
                foreach($results as $re)
                {
                    if($re == $bet->dice_value)
                    {
                        $coin = $coin + $bet->coin;
                    }
                }
            }
            $user->coin = $coin;
            $user->save();
        }
        //UserBet::truncate();
        return $results;
    }
}
