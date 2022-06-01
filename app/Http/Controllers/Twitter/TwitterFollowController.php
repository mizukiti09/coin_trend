<?php

namespace App\Http\Controllers\Twitter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CleanArchitectureMiddleware;
use packages\UseCase\Twitter\Follow\TwitterAutoFollowUseCaseInterface;
use packages\UseCase\Twitter\Follow\TwitterClickFollowUseCaseInterface;

class TwitterFollowController extends Controller
{
    // フォローページ表示
    public function index()
    {
        CleanArchitectureMiddleware::$view = view('pages.twitter.follow.follow');
    }

    // ユーザーが一つずつフォロー
    public function clickFollow(Request $request, TwitterClickFollowUseCaseInterface $interactor)
    {
        $interactor->followHandle($request->nickname, intval($request->user_id));
    }

    // 自動フォロー
    public function autoFollow(Request $request, TwitterAutoFollowUseCaseInterface $interactor)
    {
        $interactor->autoFollowHandle(intval($request->user_id));
    }
}
