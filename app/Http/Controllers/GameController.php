<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserBet;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function bet(Request $rq)
    {
        $user = User::find($rq->user_id);
        //Neu tien hien tai cua user nho hon so tien bet
        if($user->coin < $rq->coin)
        {
            return response()->json([
                'success' => false,
                'message'=>'Not enough money'
            ], 401);
        }

        $user_bet = UserBet::where('user_id', $rq->user_id)->where('dice_value', $rq->dice_value);
        //Neu user da bet voi dice_value nay roi
        if($user_bet)
        {
            //Cong them tien vao bet voi dice_value nay
            $user_bet->coin = $user_bet->coin + $rq->coin;
            $user_bet->update();
        }
        else
        {
            //Them mot user bet moi
            $user_bet = new UserBet();
            $user_bet->user_id = $rq->user_id;
            $user_bet->coin = $rq->coin;
            $user_bet->dice_value = $rq->dice_value;
            $user_bet->save();
        }
        return response()->json([
            'success' => true,
            'message'=>'Ok'
        ], 200);
    }

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
