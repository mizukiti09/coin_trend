<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinTweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coin_tweets')->insert([
            [
                'name' => 'btc'
            ],
            [
                'name' => 'eth'
            ],
            [
                'name' => 'etc'
            ],
            [
                'name' => 'lsk'
            ],
            [
                'name' => 'xrp'
            ],
            [
                'name' => 'xem'
            ],
            [
                'name' => 'ltc'
            ],
            [
                'name' => 'bch'
            ],
            [
                'name' => 'mona'
            ],
            [
                'name' => 'xlm'
            ],
            [
                'name' => 'qtum'
            ],
            [
                'name' => 'bat'
            ],
            [
                'name' => 'iost'
            ],
            [
                'name' => 'enj'
            ],
            [
                'name' => 'omg'
            ],
            [
                'name' => 'plt'
            ],
            [
                'name' => 'xym'
            ],
            [
                'name' => 'dash'
            ],
            [
                'name' => 'zec'
            ],
            [
                'name' => 'xmr'
            ],
            [
                'name' => 'rep'
            ],
            [
                'name' => 'fct'
            ],
        ]);
    }
}
