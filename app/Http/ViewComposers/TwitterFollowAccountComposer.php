<?php

namespace App\Http\ViewComposers;

use App\Facades\Twitter;
use Illuminate\View\View;

class TwitterFollowAccountComposer
{
    protected $twitter;

    public function __construct(Twitter $twitter)
    {
        $this->twitter = $twitter;
    }

    public function compose(View $view)
    {
        $accounts = Twitter::followAccounts();
        $accounts = Twitter::followCheck($accounts);
        $view->with('accounts', $accounts);
    }
}
