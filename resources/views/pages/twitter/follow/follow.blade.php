@section('title', 'C Checker / 自動フォロー')@extends('app') @section('content')

<div class="c-contents">
    <section class="p-follow f-section">
        <div class="c-section__title">
            <h1>Follow all together</h1>
        </div>

        <twitter-auto-follow-btn
            :user_id="{{ $user['id'] }}"
            :auto_follow_flg="{{ $autoFollowFlg }}">
        </twitter-auto-follow-btn>

        <div class="c-section__container">
            <twitter-account 
                :accounts="{{ json_encode($accounts) }}"
                :user_id="{{ $user['id'] }}"
                :auto_follow_flg="{{ $autoFollowFlg }}">
            </twitter-account>
        </div>
    </section>


</div>
@endsection