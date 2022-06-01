<?php

namespace App\Http\Presenters\Twitter;

use App\Facades\Twitter;
use App\Http\Middleware\CleanArchitectureMiddleware;
use packages\UseCase\Twitter\Follow\TwitterFollowPresenterInterface;

class TwitterFollowPresenter implements TwitterFollowPresenterInterface
{
    public function handle()
    {
        CleanArchitectureMiddleware::$view = view('pages.twitter.follow.follow', compact('accounts'));
    }
}
