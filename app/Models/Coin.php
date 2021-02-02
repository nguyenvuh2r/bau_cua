<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;

    public static function get_coins()
    {
        return ["10", "20", "50", "100", "200", "500"];
    }
}
