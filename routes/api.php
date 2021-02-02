<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('game')->group(function() {
    //Return all coin value
    Route::get('/coins', function() {
        $coins = ["10", "20", "50", "100", "200", "500"];
        return json_encode($coins);
    });

    //Return all dice value
    Route::get('/dices', function() {
        $dices = array(
            'bau' => 'Bầu',
            'cua' => 'Cua',
            'tom' => 'Tôm',
            'ca' => 'Cá',
            'nai' => 'Nai',
            'ga' => 'Gà'
        );
        return json_encode($dices);
    });
});
