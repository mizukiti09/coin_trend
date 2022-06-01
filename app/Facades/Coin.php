<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Coin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'coin';
    }
}
