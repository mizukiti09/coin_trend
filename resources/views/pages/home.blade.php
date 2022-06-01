@section('title', 'C Checker')@extends('app') @section('content') @include('layouts.hero')

<div class="c-contents">
    <section class="p-problem f-section">
        <div class="c-section__title u-fade-down">
            <h1>Problem?</h1>
        </div>
        <div class="p-problem__img">
            <img class="u-img u-fade-up" src="{{ asset('images/problem.png') }}" alt="problem">
        </div>
        <div class="p-problem__description u-fade-up">
            <p>これからますます実用化が進む仮想通貨。<br><br> そんな時代にいち早く良い情報を仕入れることは、将来の生活を豊かにする為に重要なことの一つです。<br> <br> C Checker ではTwitterを介して<br>仮想通貨に関連するツイートを各コイン都度に閲覧できたり、 仮想通貨に関連するアカウントを自動フォローなど、<br> これから仮想通貨を効率良く運用する為の情報を提供しております。

            </p>
        </div>
    </section>

    <section class="f-section p-service">
        <div class="c-section__title u-fade-down">
            <h1>Our Service</h1>
        </div>
        <div>
            <ul class="p-service__list">
                <li class="p-service__item">
                    <div class="p-service__img u-ex ">
                        <img class="u-fade-up u-img" src="{{asset('images/twitter.jpg')}}" alt="twitter.jpg">
                    </div>
                    <div class="p-service__description">
                        <a href="" class="u-fade-up">
                            <div class="u-catch">
                                <p>Twitter</p>
                            </div>
                            <p class="u-catch-sub">
                                twitterと連携し、仮想通貨に関するアカウントの自動フォローやトレンド情報を入手。
                            </p>

                            <p><i class="fas fa-external-link-alt arrow-link main-cl"></i></p>
                        </a>
                    </div>
                </li>
                <li class="p-service__item">
                    <div class="p-service__img ex">
                        <img class="u-fade-up u-img" src="{{asset('images/crypr-image.jpg')}}" alt="techpassion01">
                    </div>
                    <div class="p-service__description">
                        <a href="" class="u-fade-up">
                            <div class="u-catch">
                                <p>仮想通貨銘柄</p>
                            </div>
                            <p class="u-catch-sub">
                                現在出回っている仮想通貨の銘柄毎の24時間での最高取引価格、24時間での最安取引価格情報の提供。
                            </p>

                            <p><i class="fas fa-external-link-alt arrow-link"></i></p>
                        </a>
                    </div>
                </li>
                <li class="p-service__item">
                    <div class="p-service__img ex">
                        <img class="u-fade-up u-img" src="{{asset('images/chart_coin.jpg')}}" alt="6c40ac7b707e13491fda6a6b4f02d82d">
                    </div>
                    <div class="p-service__description">
                        <a href="" class="u-fade-up">
                            <div class="u-catch">
                                <p>Googleニュース</p>
                            </div>
                            <p class="u-catch-sub">「仮想通貨」というキーワードでニュースを検索し、仮想通貨関連のニュースを一覧表示</p>

                            <p><i class="fas fa-external-link-alt arrow-link"></i></p>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</div>

<section class="f-section p-start">
    <div class="c-section__title u-fade-down">
        <h1>Start</h1>
    </div>
    <div>
        <ul class="p-start__list u-inner">
            <li class="p-start__item u-fade-up">
                <div class="u-catch ">
                    <p>まとめて<br class="text-sp">フォロー</p>
                </div>
                <p class="u-catch-sub">自動で仮想通貨関連のアカウントを自動フォロー</p>
            </li>
            <li class="p-start__item u-fade-up">
                <div class="u-catch">
                    <p>仮想通貨<br class="u-blockNone">トレンド情報</p>
                </div>
                <p class="u-catch-sub">世の中の仮想通貨トレンドを見る</p>
            </li>
            <li class="p-start__item u-fade-up">
                <div class="u-catch">
                    <p>Google<br class="text-sp">ニュース</p>
                </div>
                <p class="u-catch-sub">Google仮想通貨ニュースを見る</p>
            </li>
        </ul>

    </div>

</section>



</div>



@endsection