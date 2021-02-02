<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Coin;

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

Route::get('/get_coins', function () {
    $coins = Coin::get_coins();
    return json_encode($coins);
});
