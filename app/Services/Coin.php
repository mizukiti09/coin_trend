<?php

namespace App\Services;

use App\Facades\Twitter;
use Illuminate\Support\Facades\DB;
use packages\Domain\Domain\Coin\CoinTweetRepositoryInterface;

class Coin
{
    private $repository;

    // 今の時間
    private $nowTime;
    // 1時間前
    private $hourAgoTime;
    // 先日の時間
    private $dayAgoTime;
    // 1週間前の時間
    private $weekAgoTime;

    // ビットコイン
    private $btc;
    // 1時間前のツイート
    private $btcTweetHourAgo = 0;
    // 1日前のツイート
    private $btcTweetDayAgo = 0;
    // 1週間前のツイート
    private $btcTweetWeekAgo = 0;

    // イーサリアム
    private $eth;
    // 1時間前のツイート
    private $ethTweetHourAgo = 0;
    // 1日前のツイート
    private $ethTweetDayAgo = 0;
    // 1週間前のツイート
    private $ethTweetWeekAgo = 0;

    // イーサリアムクラシック
    private $etc;
    // 1時間前のツイート
    private $etcTweetHourAgo = 0;
    // 1日前のツイート
    private $etcTweetDayAgo = 0;
    // 1週間前のツイート
    private $etcTweetWeekAgo = 0;

    // リスク
    private $lsk;
    // 1時間前のツイート
    private $lskTweetHourAgo = 0;
    // 1日前のツイート
    private $lskTweetDayAgo = 0;
    // 1週間前のツイート
    private $lskTweetWeekAgo = 0;

    // リップル
    private $xrp;
    // 1時間前のツイート
    private $xrpTweetHourAgo = 0;
    // 1日前のツイート
    private $xrpTweetDayAgo = 0;
    // 1週間前のツイート
    private $xrpTweetWeekAgo = 0;

    // ネムコイン
    private $xem;
    // 1時間前のツイート
    private $xemTweetHourAgo = 0;
    // 1日前のツイート
    private $xemTweetDayAgo = 0;
    // 1週間前のツイート
    private $xemTweetWeekAgo = 0;

    // ライトコイン
    private $ltc;
    // 1時間前のツイート
    private $ltcTweetHourAgo = 0;
    // 1日前のツイート
    private $ltcTweetDayAgo = 0;
    // 1週間前のツイート
    private $ltcTweetWeekAgo = 0;

    // ビットコインキャッシュ
    private $bch;
    // 1時間前のツイート
    private $bchTweetHourAgo = 0;
    // 1日前のツイート
    private $bchTweetDayAgo = 0;
    // 1週間前のツイート
    private $bchTweetWeekAgo = 0;

    // モナコイン
    private $mona;
    // 1時間前のツイート
    private $monaTweetHourAgo = 0;
    // 1日前のツイート
    private $monaTweetDayAgo = 0;
    // 1週間前のツイート
    private $monaTweetWeekAgo = 0;

    // ステラルーメン
    private $xlm;
    // 1時間前のツイート
    private $xlmTweetHourAgo = 0;
    // 1日前のツイート
    private $xlmTweetDayAgo = 0;
    // 1週間前のツイート
    private $xlmTweetWeekAgo = 0;

    // クアンタム
    private $qtum;
    // 1時間前のツイート
    private $qtumTweetHourAgo = 0;
    // 1日前のツイート
    private $qtumTweetDayAgo = 0;
    // 1週間前のツイート
    private $qtumTweetWeekAgo = 0;

    // ベーシックアテンショントークン
    private $bat;
    // 1時間前のツイート
    private $batTweetHourAgo = 0;
    // 1日前のツイート
    private $batTweetDayAgo = 0;
    // 1週間前のツイート
    private $batTweetWeekAgo = 0;

    // アイオーエスティー
    private $iost;
    // 1時間前のツイート
    private $iostTweetHourAgo = 0;
    // 1日前のツイート
    private $iostTweetDayAgo = 0;
    // 1週間前のツイート
    private $iostTweetWeekAgo = 0;

    // エンジンコイン
    private $enj;
    // 1時間前のツイート
    private $enjTweetHourAgo = 0;
    // 1日前のツイート
    private $enjTweetDayAgo = 0;
    // 1週間前のツイート
    private $enjTweetWeekAgo = 0;

    // オーエムジー
    private $omg;
    // 1時間前のツイート
    private $omgTweetHourAgo = 0;
    // 1日前のツイート
    private $omgTweetDayAgo = 0;
    // 1週間前のツイート
    private $omgTweetWeekAgo = 0;

    // パレットトークン
    private $plt;
    // 1時間前のツイート
    private $pltTweetHourAgo = 0;
    // 1日前のツイート
    private $pltTweetDayAgo = 0;
    // 1週間前のツイート
    private $pltTweetWeekAgo = 0;

    // シンボル
    private $xym;
    // 1時間前のツイート
    private $xymTweetHourAgo = 0;
    // 1日前のツイート
    private $xymTweetDayAgo = 0;
    // 1週間前のツイート
    private $xymTweetWeekAgo = 0;

    // ダッシュ
    private $dash;
    // 1時間前のツイート
    private $dashTweetHourAgo = 0;
    // 1日前のツイート
    private $dashTweetDayAgo = 0;
    // 1週間前のツイート
    private $dashTweetWeekAgo = 0;

    // ジーキャッシュ
    private $zec;
    // 1時間前のツイート
    private $zecTweetHourAgo = 0;
    // 1日前のツイート
    private $zecTweetDayAgo = 0;
    // 1週間前のツイート
    private $zecTweetWeekAgo = 0;

    // モネロ
    private $xmr;
    // 1時間前のツイート
    private $xmrTweetHourAgo = 0;
    // 1日前のツイート
    private $xmrTweetDayAgo = 0;
    // 1週間前のツイート
    private $xmrTweetWeekAgo = 0;

    // オーガー
    private $rep;
    // 1時間前のツイート
    private $repTweetHourAgo = 0;
    // 1日前のツイート
    private $repTweetDayAgo = 0;
    // 1週間前のツイート
    private $repTweetWeekAgo = 0;

    // ファクトム
    private $fct;
    // 1時間前のツイート
    private $fctTweetHourAgo = 0;
    // 1日前のツイート
    private $fctTweetDayAgo = 0;
    // 1週間前のツイート
    private $fctTweetWeekAgo = 0;

    public function __construct(CoinTweetRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->nowTime = date('Y-m-d_H:i:s') . "_JST";
        $this->hourAgoTime = date('Y-m-d_H:i:s', strtotime('-1 hour', time())) . "_JST";
        $this->dayAgoTime = date('Y-m-d_H:i:s', strtotime('-1 day', time())) . "_JST";
        $this->weekAgoTime = date('Y-m-d_H:i:s', strtotime('-1 week', time())) . "_JST";
        $this->btc  = $this->setCoinApi("https://coincheck.com/api/ticker");
        $this->eth  = $this->setCoinApi("https://api.zaif.jp/api/1/ticker/eth_jpy");
        $this->etc  = null; // api 取得できない
        $this->lsk  = null; // api 取得できない
        $this->xrp  = null; // api 取得できない
        $this->xem  = $this->setCoinApi("https://api.zaif.jp/api/1/ticker/xem_jpy");
        $this->ltc  = null; // api 取得できない
        $this->bch  = $this->setCoinApi("https://api.zaif.jp/api/1/ticker/bch_jpy");
        $this->mona = $this->setCoinApi("https://api.zaif.jp/api/1/ticker/mona_jpy");
        $this->xlm  = null; // api 取得できない
        $this->qtum = null; // api 取得できない
        $this->bat  = null; // api 取得できない
        $this->iost = null; // api 取得できない
        $this->enj  = null; // api 取得できない
        $this->omg  = null; // api 取得できない
        $this->plt  = null; // api 取得できない
        $this->xym  = $this->setCoinApi("https://api.zaif.jp/api/1/ticker/xym_jpy");
        $this->dash = null; // api 取得できない
        $this->zec  = null; // api 取得できない
        $this->xmr  = null; // api 取得できない
        $this->rep  = null; // api 取得できない
        $this->fct  = null; // api 取得できない
    }

    private function setCoinApi($apiUrl)
    {
        $coin_json = file_get_contents($apiUrl);
        $coin_json = mb_convert_encoding($coin_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $coin      = json_decode($coin_json, true);

        return $coin;
    }

    private function coinTweetsData($sinceTime, $untilTime, $loopNumber)
    {
        $search_key = '"cryptocurrency" OR "Btc" OR "Eth" OR "Etc" OR "Lisk" OR "Xrp" OR "Xem" OR "Ltc" OR "Bch" OR "Mona" OR "Xlm" OR "Qtum" 
        OR "Bat" OR "Iost" OR "Enj" OR "Omg" OR "Plt" OR "Xym" OR "Dash" OR "Zec" OR "Xmr" OR "Rep" OR "Fct"
        ';

        $tweet_results = Twitter::tweetsData($search_key, $sinceTime, $untilTime, $loopNumber);

        $count = count($tweet_results); //ツイート数

        //一致するテキストがあればカウントアップ
        for ($i = 0; $i < $count; $i++) {
            if (stristr($tweet_results[$i]['text'], "BTC") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->btcTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->btcTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->btcTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "ETH") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->ethTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->ethTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->ethTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "ETC") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->etcTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->etcTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->etcTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "LSK") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->lskTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->lskTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->lskTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "XRP") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->xrpTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->xrpTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->xrpTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "XEM") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->xemTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->xemTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->xemTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "LTC") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->ltcTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->ltcTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->ltcTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "BCH") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->bchTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->bchTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->bchTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "MONA") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->monaTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->monaTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->monaTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "XLM") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->xlmTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->xlmTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->xlmTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "QTUM") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->qtumTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->qtumTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->qtumTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "BAT") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->batTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->batTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->batTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "IOST") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->iostTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->iostTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->iostTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "ENJ") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->enjTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->enjTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->enjTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "OMG") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->omgTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->omgTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->omgTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "PLT") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->pltTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->pltTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->pltTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "XYM") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->xymTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->xymTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->xymTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "DASH") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->dashTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->dashTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->dashTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "ZEC") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->zecTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->zecTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->zecTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "XMR") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->xmrTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->xmrTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->xmrTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "REP") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->repTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->repTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->repTweetWeekAgo++;
                }
            }
            if (stristr($tweet_results[$i]['text'], "FCT") !== false) {
                if ($sinceTime === $this->hourAgoTime) {
                    $this->fctTweetHourAgo++;
                } elseif ($sinceTime === $this->dayAgoTime) {
                    $this->fctTweetDayAgo++;
                } elseif ($sinceTime === $this->weekAgoTime) {
                    $this->fctTweetWeekAgo++;
                }
            }
        }
    }

    public function allCoinGet()
    {
        // 過去1時間のツイートデータ
        $this->coinTweetsData($this->hourAgoTime, $this->nowTime, 1);
        // 過去1日のツイートデータ
        $this->coinTweetsData($this->dayAgoTime, $this->nowTime, 24);
        // 過去1週間のツイートデータ
        $this->coinTweetsData($this->weekAgoTime, $this->nowTime, 168);

        $coins = [
            'btc'  => [
                'coin_info' => $this->btc,
                'tweetsData' => [
                    'tweetHourAgo' => $this->btcTweetHourAgo,
                    'tweetDayAgo'  => $this->btcTweetDayAgo,
                    'tweetWeekAgo' => $this->btcTweetWeekAgo,
                ],
            ],
            'eth'  => [
                'coin_info' => $this->eth,
                'tweetsData' => [
                    'tweetHourAgo' => $this->ethTweetHourAgo,
                    'tweetDayAgo'  => $this->ethTweetDayAgo,
                    'tweetWeekAgo' => $this->ethTweetWeekAgo,
                ],
            ],
            'etc'  => [
                'coin_info' => $this->etc,
                'tweetsData' => [
                    'tweetHourAgo' => $this->etcTweetHourAgo,
                    'tweetDayAgo'  => $this->etcTweetDayAgo,
                    'tweetWeekAgo' => $this->etcTweetWeekAgo,
                ],
            ],
            'lsk'  => [
                'coin_info' => $this->lsk,
                'tweetsData' => [
                    'tweetHourAgo' => $this->lskTweetHourAgo,
                    'tweetDayAgo'  => $this->lskTweetDayAgo,
                    'tweetWeekAgo' => $this->lskTweetWeekAgo,
                ],
            ],
            'xrp'  => [
                'coin_info' => $this->xrp,
                'tweetsData' => [
                    'tweetHourAgo' => $this->xrpTweetHourAgo,
                    'tweetDayAgo'  => $this->xrpTweetDayAgo,
                    'tweetWeekAgo' => $this->xrpTweetWeekAgo,
                ],
            ],
            'xem'  => [
                'coin_info' => $this->xem,
                'tweetsData' => [
                    'tweetHourAgo' => $this->xemTweetHourAgo,
                    'tweetDayAgo'  => $this->xemTweetDayAgo,
                    'tweetWeekAgo' => $this->xemTweetWeekAgo,
                ],
            ],
            'ltc'  => [
                'coin_info' => $this->ltc,
                'tweetsData' => [
                    'tweetHourAgo' => $this->ltcTweetHourAgo,
                    'tweetDayAgo'  => $this->ltcTweetDayAgo,
                    'tweetWeekAgo' => $this->ltcTweetWeekAgo,
                ],
            ],
            'bch'  => [
                'coin_info' => $this->bch,
                'tweetsData' => [
                    'tweetHourAgo' => $this->bchTweetHourAgo,
                    'tweetDayAgo'  => $this->bchTweetDayAgo,
                    'tweetWeekAgo' => $this->bchTweetWeekAgo,
                ],
            ],
            'mona' => [
                'coin_info' => $this->mona,
                'tweetsData' => [
                    'tweetHourAgo' => $this->monaTweetHourAgo,
                    'tweetDayAgo'  => $this->monaTweetDayAgo,
                    'tweetWeekAgo' => $this->monaTweetWeekAgo,
                ],
            ],
            'xlm'  => [
                'coin_info' => $this->xlm,
                'tweetsData' => [
                    'tweetHourAgo' => $this->xlmTweetHourAgo,
                    'tweetDayAgo'  => $this->xlmTweetDayAgo,
                    'tweetWeekAgo' => $this->xlmTweetWeekAgo,
                ],
            ],
            'qtum' => [
                'coin_info' => $this->qtum,
                'tweetsData' => [
                    'tweetHourAgo' => $this->qtumTweetHourAgo,
                    'tweetDayAgo'  => $this->qtumTweetDayAgo,
                    'tweetWeekAgo' => $this->qtumTweetWeekAgo,
                ],
            ],
            'bat'  => [
                'coin_info' => $this->bat,
                'tweetsData' => [
                    'tweetHourAgo' => $this->batTweetHourAgo,
                    'tweetDayAgo'  => $this->batTweetDayAgo,
                    'tweetWeekAgo' => $this->batTweetWeekAgo,
                ],
            ],
            'iost' => [
                'coin_info' => $this->iost,
                'tweetsData' => [
                    'tweetHourAgo' => $this->iostTweetHourAgo,
                    'tweetDayAgo'  => $this->iostTweetDayAgo,
                    'tweetWeekAgo' => $this->iostTweetWeekAgo,
                ],
            ],
            'enj'  => [
                'coin_info' => $this->enj,
                'tweetsData' => [
                    'tweetHourAgo' => $this->enjTweetHourAgo,
                    'tweetDayAgo'  => $this->enjTweetDayAgo,
                    'tweetWeekAgo' => $this->enjTweetWeekAgo,
                ],
            ],
            'omg'  => [
                'coin_info' => $this->omg,
                'tweetsData' => [
                    'tweetHourAgo' => $this->omgTweetHourAgo,
                    'tweetDayAgo'  => $this->omgTweetDayAgo,
                    'tweetWeekAgo' => $this->omgTweetWeekAgo,
                ],
            ],
            'plt'  => [
                'coin_info' => $this->plt,
                'tweetsData' => [
                    'tweetHourAgo' => $this->pltTweetHourAgo,
                    'tweetDayAgo'  => $this->pltTweetDayAgo,
                    'tweetWeekAgo' => $this->pltTweetWeekAgo,
                ],
            ],
            'xym'  => [
                'coin_info' => $this->xym,
                'tweetsData' => [
                    'tweetHourAgo' => $this->xymTweetHourAgo,
                    'tweetDayAgo'  => $this->xymTweetDayAgo,
                    'tweetWeekAgo' => $this->xymTweetWeekAgo,
                ],
            ],
            'dash' => [
                'coin_info' => $this->dash,
                'tweetsData' => [
                    'tweetHourAgo' => $this->dashTweetHourAgo,
                    'tweetDayAgo'  => $this->dashTweetDayAgo,
                    'tweetWeekAgo' => $this->dashTweetWeekAgo,
                ],
            ],
            'zec'  => [
                'coin_info' => $this->zec,
                'tweetsData' => [
                    'tweetHourAgo' => $this->zecTweetHourAgo,
                    'tweetDayAgo'  => $this->zecTweetDayAgo,
                    'tweetWeekAgo' => $this->zecTweetWeekAgo,
                ],
            ],
            'xmr'  => [
                'coin_info' => $this->xmr,
                'tweetsData' => [
                    'tweetHourAgo' => $this->xmrTweetHourAgo,
                    'tweetDayAgo'  => $this->xmrTweetDayAgo,
                    'tweetWeekAgo' => $this->xmrTweetWeekAgo,
                ],
            ],
            'rep'  => [
                'coin_info' => $this->rep,
                'tweetsData' => [
                    'tweetHourAgo' => $this->repTweetHourAgo,
                    'tweetDayAgo'  => $this->repTweetDayAgo,
                    'tweetWeekAgo' => $this->repTweetWeekAgo,
                ],
            ],
            'fct'  => [
                'coin_info' => $this->fct,
                'tweetsData' => [
                    'tweetHourAgo' => $this->fctTweetHourAgo,
                    'tweetDayAgo'  => $this->fctTweetDayAgo,
                    'tweetWeekAgo' => $this->fctTweetWeekAgo,
                ],
            ],
        ];

        return $coins;
    }

    public function updateCoinData()
    {
        $coins = $this->allCoinGet();

        $this->repository->save(
            'btc',
            $coins['btc']['tweetsData']['tweetHourAgo'],
            $coins['btc']['tweetsData']['tweetDayAgo'],
            $coins['btc']['tweetsData']['tweetWeekAgo'],
            $coins['btc']['coin_info']['high'],
            $coins['btc']['coin_info']['low']
        );
        $this->repository->save(
            'eth',
            $coins['eth']['tweetsData']['tweetHourAgo'],
            $coins['eth']['tweetsData']['tweetDayAgo'],
            $coins['eth']['tweetsData']['tweetWeekAgo'],
            $coins['eth']['coin_info']['high'],
            $coins['eth']['coin_info']['low']
        );
        $this->repository->save(
            'etc',
            $coins['etc']['tweetsData']['tweetHourAgo'],
            $coins['etc']['tweetsData']['tweetDayAgo'],
            $coins['etc']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
        $this->repository->save(
            'lsk',
            $coins['lsk']['tweetsData']['tweetHourAgo'],
            $coins['lsk']['tweetsData']['tweetDayAgo'],
            $coins['lsk']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
        $this->repository->save(
            'xrp',
            $coins['xrp']['tweetsData']['tweetHourAgo'],
            $coins['xrp']['tweetsData']['tweetDayAgo'],
            $coins['xrp']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
        $this->repository->save(
            'xem',
            $coins['xem']['tweetsData']['tweetHourAgo'],
            $coins['xem']['tweetsData']['tweetDayAgo'],
            $coins['xem']['tweetsData']['tweetWeekAgo'],
            $coins['xem']['coin_info']['high'],
            $coins['xem']['coin_info']['low']
        );
        $this->repository->save(
            'ltc',
            $coins['ltc']['tweetsData']['tweetHourAgo'],
            $coins['ltc']['tweetsData']['tweetDayAgo'],
            $coins['ltc']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
        $this->repository->save(
            'bch',
            $coins['bch']['tweetsData']['tweetHourAgo'],
            $coins['bch']['tweetsData']['tweetDayAgo'],
            $coins['bch']['tweetsData']['tweetWeekAgo'],
            $coins['bch']['coin_info']['high'],
            $coins['bch']['coin_info']['low']
        );
        $this->repository->save(
            'mona',
            $coins['mona']['tweetsData']['tweetHourAgo'],
            $coins['mona']['tweetsData']['tweetDayAgo'],
            $coins['mona']['tweetsData']['tweetWeekAgo'],
            $coins['mona']['coin_info']['high'],
            $coins['mona']['coin_info']['low']
        );
        $this->repository->save(
            'xlm',
            $coins['xlm']['tweetsData']['tweetHourAgo'],
            $coins['xlm']['tweetsData']['tweetDayAgo'],
            $coins['xlm']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
        $this->repository->save(
            'qtum',
            $coins['qtum']['tweetsData']['tweetHourAgo'],
            $coins['qtum']['tweetsData']['tweetDayAgo'],
            $coins['qtum']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
        $this->repository->save(
            'bat',
            $coins['bat']['tweetsData']['tweetHourAgo'],
            $coins['bat']['tweetsData']['tweetDayAgo'],
            $coins['bat']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
        $this->repository->save(
            'iost',
            $coins['iost']['tweetsData']['tweetHourAgo'],
            $coins['iost']['tweetsData']['tweetDayAgo'],
            $coins['iost']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
        $this->repository->save(
            'enj',
            $coins['enj']['tweetsData']['tweetHourAgo'],
            $coins['enj']['tweetsData']['tweetDayAgo'],
            $coins['enj']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
        $this->repository->save(
            'omg',
            $coins['omg']['tweetsData']['tweetHourAgo'],
            $coins['omg']['tweetsData']['tweetDayAgo'],
            $coins['omg']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
        $this->repository->save(
            'plt',
            $coins['plt']['tweetsData']['tweetHourAgo'],
            $coins['plt']['tweetsData']['tweetDayAgo'],
            $coins['plt']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
        $this->repository->save(
            'xym',
            $coins['xym']['tweetsData']['tweetHourAgo'],
            $coins['xym']['tweetsData']['tweetDayAgo'],
            $coins['xym']['tweetsData']['tweetWeekAgo'],
            $coins['xym']['coin_info']['high'],
            $coins['xym']['coin_info']['low']
        );
        $this->repository->save(
            'dash',
            $coins['dash']['tweetsData']['tweetHourAgo'],
            $coins['dash']['tweetsData']['tweetDayAgo'],
            $coins['dash']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
        $this->repository->save(
            'zec',
            $coins['zec']['tweetsData']['tweetHourAgo'],
            $coins['zec']['tweetsData']['tweetDayAgo'],
            $coins['zec']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
        $this->repository->save(
            'xmr',
            $coins['xmr']['tweetsData']['tweetHourAgo'],
            $coins['xmr']['tweetsData']['tweetDayAgo'],
            $coins['xmr']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
        $this->repository->save(
            'rep',
            $coins['rep']['tweetsData']['tweetHourAgo'],
            $coins['rep']['tweetsData']['tweetDayAgo'],
            $coins['rep']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
        $this->repository->save(
            'fct',
            $coins['fct']['tweetsData']['tweetHourAgo'],
            $coins['fct']['tweetsData']['tweetDayAgo'],
            $coins['fct']['tweetsData']['tweetWeekAgo'],
            null,
            null
        );
    }
}
