<?php

namespace packages\Domain\Application\Twitter;

use App\Facades\Twitter;
use Illuminate\Support\Facades\Log;
use packages\Domain\Domain\Twitter\FollowAccounts\TwitterFollowAccountsRepositoryInterface;
use packages\UseCase\Twitter\Follow\TwitterAutoFollowUseCaseInterface;
use packages\UseCase\Twitter\Follow\TwitterClickFollowUseCaseInterface;
use packages\Domain\Domain\User\TwitterAuth\UserTwitterFollowRepositoryInterface;


class TwitterFollowInteractor implements TwitterClickFollowUseCaseInterface, TwitterAutoFollowUseCaseInterface
{
    private $u_repository;
    private $t_repository;

    public function __construct(
        UserTwitterFollowRepositoryInterface $u_repository,
        TwitterFollowAccountsRepositoryInterface $t_repository
    ) {
        $this->u_repository = $u_repository;
        $this->t_repository = $t_repository;
    }

    public function followHandle($nickname, $user_id)
    {
        $this->u_repository->userFollowCountResetBy24HoursAgo($user_id);
        if ($this->u_repository->followCountUpperCheck($user_id) == true) {
            Twitter::setAccessToken($user_id);
            Twitter::setAccessTokenSecret($user_id);
            Log::info($nickname);
            $response = Twitter::getConnection()->post('friendships/create', array(
                "screen_name" => $nickname,
            ));

            if (isset($response->error) && $response->error != '') {
                return $response->error;
            } else {
                $this->u_repository->followCountSave($user_id);
                return $response;
            }
        } else {
            return;
        }
    }

    // 1分都度に自動フォロー
    public function autoFollowHandle($user_id)
    {
        $this->u_repository->userFollowCountResetBy24HoursAgo($user_id);
        if ($this->u_repository->followCountUpperCheck($user_id) == true) {
            $account = $this->t_repository->getAutoFollowAccountRandomSort($user_id);

            $response = Twitter::getConnection()->post('friendships/create', array(
                "screen_name" => $account->screen_name,
            ));

            if (isset($response->error) && $response->error != '') {
                return $response->error;
            } else {
                $this->u_repository->followCountSave($user_id);
                Log::info('カウントアップ');
            }
        } else {
            return;
        }
    }

    public function stopAutoFollowHandle($user_id, $auto_follow_flg)
    {
        if ($auto_follow_flg === 1) {
            $this->u_repository->updateAutoFollowFlgFalse($user_id);
        }
    }
}
