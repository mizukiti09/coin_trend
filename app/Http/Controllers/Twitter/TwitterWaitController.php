<?php

namespace App\Http\Controllers\Twitter;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CleanArchitectureMiddleware;


class TwitterWaitController extends Controller
{
    // アクセス制限の際に表示するページ
    public function index()
    {
        CleanArchitectureMiddleware::$view = view('pages.twitter.follow.follow_wait');
    }
}
