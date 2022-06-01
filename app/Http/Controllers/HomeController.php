<?php

namespace App\Http\Controllers;

use App\Facades\Coin;
use App\Facades\Twitter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CleanArchitectureMiddleware;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        CleanArchitectureMiddleware::$view = view('pages.home');
    }
}
