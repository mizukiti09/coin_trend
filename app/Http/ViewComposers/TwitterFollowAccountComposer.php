<?php

namespace App\Http\ViewComposers;

use Exception;
use Illuminate\View\View;
use packages\Domain\Domain\User\TwitterAuth\UserTwitterFollowRepositoryInterface;
use packages\Domain\Domain\Twitter\FollowAccounts\TwitterFollowAccountsRepositoryInterface;

class TwitterFollowAccountComposer
{
    protected $t_repository;
    protected $u_repository;

    public function __construct(
        TwitterFollowAccountsRepositoryInterface $t_repository,
        UserTwitterFollowRepositoryInterface $u_Repository
    ) {
        $this->t_repository = $t_repository;
        $this->u_repository = $u_Repository;
    }

    public function compose(View $view)
    {
        try {
            $accounts      = $this->t_repository->getFollowAccountsRandomSort();
            $autoFollowFlg = $this->u_repository->getAutoFollowFlg();

            $view->with([
                'accounts'      => $accounts,
                'autoFollowFlg' => $autoFollowFlg,
            ]);
        } catch (Exception $e) {
            return redirect()->route('twitter.follow.follow_wait');
        }
    }
}
