<?php

namespace packages\Infrastructure\Coin;

use Illuminate\Support\Facades\DB;
use packages\Domain\Domain\Coin\CoinTweetRepositoryInterface;

class CoinTweetRepository implements CoinTweetRepositoryInterface
{
    public function save($coin_name, $hour_ago, $day_ago, $week_ago, $high, $low)
    {
        DB::table('coin_tweets')
            ->where('name', $coin_name)
            ->update([
                'hour_ago' => $hour_ago,
                'day_ago'  => $day_ago,
                'week_ago' => $week_ago,
                'high'     => $high,
                'low'      => $low,
            ]);
    }

    public function getCoinRankingHourAgoInfo()
    {
        $results = DB::select(
            "SELECT
                `name`, 
                `hour_ago`,
                `high`,
                `low`,
                `updated_at`
            FROM 
                coin_tweets 
            ORDER BY 
                cast(`hour_ago` as SIGNED) DESC"
        );

        return $results;
    }

    public function getCoinRankingDayAgoInfo()
    {
        $results = DB::select(
            "SELECT
                `name`, 
                `day_ago`,
                `high`,
                `low`,
                `updated_at`
            FROM coin_tweets 
            ORDER BY 
                cast(`day_ago` as SIGNED) DESC"
        );

        return $results;
    }

    public function getCoinRankingWeekAgoInfo()
    {
        $results = DB::select(
            "SELECT
                `name`, 
                `week_ago`,
                `high`,
                `low`,
                `updated_at`
            FROM coin_tweets 
            ORDER BY 
                cast(`week_ago` as SIGNED) DESC"
        );

        return $results;
    }

    public function getEachCoinInfo()
    {
        $results = DB::select(
            "SELECT
                *
            FROM coin_tweets"
        );

        return $results;
    }
}
