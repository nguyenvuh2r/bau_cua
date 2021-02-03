<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Jobs\GameStateJob;
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

Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::prefix('game')->group(function () {
        //Return all coin value
        Route::get('/coins', function () {
            $coins = ["10", "20", "50", "100", "200", "500"];
            return json_encode($coins);
        });

        //Return all dice value
        Route::get('/dices', function () {
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

        Route::post('/bet', function () {
        });

        Route::get('/roll', [GameController::class, 'roll']);
    });

    Route::prefix('user')->group(function () {
        Route::get('/logout', [AuthController::class,'logout']);
        Route::get('/info', [AuthController::class,'getUser']);
    });
});
