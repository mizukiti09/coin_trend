<?php

namespace App\Console\Commands;

use App\Facades\Coin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CoinTweets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:coinTweets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'coin_tweetsテーブルの更新';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::debug('定期処理:開始:coinTweets');
        Coin::updateCoinData();
    }
}
