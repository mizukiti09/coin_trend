@section('title', 'C Checker / Googleニュース')@extends('app') @section('content')
<div class="c-contents">
    <section class="p-googleNews f-section">
        <div class="c-section__title">
            <h1>Google News</h1>
        </div>
        <div class="c-section__description">
            <h2>Googleニュースで『仮想通貨』の<br>情報をキャッチアップ</h2>
            <br>
        </div>

        <div class="c-section__container">
            <google-news :list_gn="{{ json_encode($list_gn) }}"></google-news>
        </div>
    </section>
</div>
@endsection