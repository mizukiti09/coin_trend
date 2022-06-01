@section('title', 'C Checker / coin trend')@extends('app') @section('content')

<div class="c-contents">
    <section class="p-trend f-section">
        <div class="c-section__title">
            <h1>Coin Trend</h1>
        </div>
        <div class="c-section__description">
            <h2>Twitterで『仮想通貨』に関連したツイートを銘柄都度に取得し、<br>情報のキャッチアップ。</h2>
        </div>

        <twitter-coin-trend 
            :hour_ago="{{ json_encode($hour_ago) }}"
            :day_ago="{{ json_encode($day_ago) }}"
            :week_ago="{{ json_encode($week_ago) }}"
            :each_coins="{{ json_encode($each_coins) }}">
        </twitter-coin-trend>
    </section>


</div>
@endsection