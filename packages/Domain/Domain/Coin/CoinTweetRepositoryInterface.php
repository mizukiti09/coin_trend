<?php

namespace packages\Domain\Domain\Coin;

interface CoinTweetRepositoryInterface
{
    /**
     * @param $coin_name
     */
    // 各コインのツイート件数を保存
    public function save($coin_name, $hour_ago, $day_ago, $week_ago, $high, $low);

    // 過去1時間のツイート件数を取得
    public function getCoinRankingHourAgoInfo();

    // 過去1日のツイート件数を取得
    public function getCoinRankingDayAgoInfo();

    // 過去1週間のツイート件数を取得
    public function getCoinRankingWeekAgoInfo();

    // 各銘柄のcoin_tweetsの全データ取得
    public function getEachCoinInfo();
}
