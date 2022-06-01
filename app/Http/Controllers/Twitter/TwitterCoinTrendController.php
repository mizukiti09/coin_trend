<?php

namespace App\Http\Controllers\Twitter;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CleanArchitectureMiddleware;
use packages\Domain\Domain\Coin\CoinTweetRepositoryInterface;

class TwitterCoinTrendController extends Controller
{
    // コイントレンドページ表示
    public function index(CoinTweetRepositoryInterface $repository)
    {
        $hour_ago = $repository->getCoinRankingHourAgoInfo();
        $day_ago  = $repository->getCoinRankingDayAgoInfo();
        $week_ago = $repository->getCoinRankingWeekAgoInfo();
        $each_coins = $repository->getEachCoinInfo();

        CleanArchitectureMiddleware::$view = view(
            'pages.twitter.coin_trend.coin_trend',
            compact('hour_ago', 'day_ago', 'week_ago', 'each_coins')
        );
    }
}
