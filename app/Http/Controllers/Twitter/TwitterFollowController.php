<?php

namespace App\Http\Controllers\Twitter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\CleanArchitectureMiddleware;
use packages\UseCase\Twitter\Follow\TwitterAutoFollowUseCaseInterface;
use packages\UseCase\Twitter\Follow\TwitterClickFollowUseCaseInterface;
use packages\Domain\Domain\User\TwitterAuth\UserTwitterAuthRepositoryInterface;
use packages\Domain\Domain\User\TwitterAuth\UserTwitterFollowRepositoryInterface;

class TwitterFollowController extends Controller
{
    // フォローページ表示
    public function index(Request $request, UserTwitterAuthRepositoryInterface $repository)
    {
        CleanArchitectureMiddleware::$view = view('pages.twitter.follow.follow');
    }

    // ユーザーが一つずつフォロー
    public function clickFollow(
        Request $request,
        TwitterClickFollowUseCaseInterface $interactor
    ) {
        $interactor->followHandle($request->nickname, intval($request->user_id));
    }

    // 自動フォロー
    public function autoFollow(
        Request $request,
        UserTwitterFollowRepositoryInterface $repository
    ) {
        // 自動フォローフラグをONにする
        if (intval($request->auto_follow_flg) === 0) {
            $repository->updateAutoFollowFlgTrue(intval($request->user_id));
        }
    }

    public function stopAutoFollow(Request $request, TwitterAutoFollowUseCaseInterface $interactor)
    {
        if (intval($request->auto_follow_flg) === 1) {
            $interactor->stopAutoFollowHandle(intval($request->user_id), intval($request->auto_follow_flg));
        }
    }
}
