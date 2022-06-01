<?php

namespace App\Http\Controllers\Google;

use App\Facades\Google;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CleanArchitectureMiddleware;
use packages\Domain\Domain\User\TwitterAuth\UserTwitterFollowRepositoryInterface;


class GoogleNewsController extends Controller
{
    public function index(UserTwitterFollowRepositoryInterface $repository)
    {
        $list_gn = Google::news();
        CleanArchitectureMiddleware::$view = view('pages.google.news', compact('list_gn'));
    }
}
