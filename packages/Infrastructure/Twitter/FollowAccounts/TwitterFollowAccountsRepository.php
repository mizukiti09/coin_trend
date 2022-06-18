<?php

namespace packages\Infrastructure\Twitter\FollowAccounts;

use App\Facades\Twitter;
use App\Follow_Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use packages\Domain\Domain\Twitter\FollowAccounts\TwitterFollowAccountsRepositoryInterface;

class TwitterFollowAccountsRepository implements TwitterFollowAccountsRepositoryInterface
{
    public function cronFollowAccountsSave($page)
    {
        $accounts = Twitter::followAccounts($page);

        foreach ($accounts as $account) {

            if (isset($account->status->retweeted_status)) {
                $full_text = $account->status->retweeted_status->full_text;
            } else {
                if (isset($account->status->full_text)) {
                    $full_text = $account->status->full_text;
                } else {
                    $full_text = null;
                }
            }

            $media = (isset($account->status->entities->media)) ? $account->status->entities->media[0]->media_url_https : null;

            Follow_Account::updateOrCreate(
                ['screen_name' => $account->screen_name],
                [
                    'twitter_id'        => $account->id,
                    'name'              => $account->name,
                    'screen_name'       => $account->screen_name,
                    'description'       => $account->description,
                    'friends_count'     => $account->friends_count,
                    'followers_count'   => $account->followers_count,
                    'profile_image_url' => $account->profile_image_url,
                    'full_text'         => $full_text,
                    'media_url_https'   => $media,
                ]
            );

            Log::info('更新しました：' . $page);
        }
    }

    public function getFollowAccountsRandomSort()
    {
        $accounts = DB::select(
            'SELECT 
                * 
            from follow_accounts'
        );

        $yetFollows = Twitter::followCheck($accounts);

        if (count($yetFollows) >= 15) {
            $randKeys = array_rand($yetFollows, 15);

            $results = array();
            foreach ($randKeys as $key) {
                array_push($results, $yetFollows[$key]);
            }
            shuffle($results);

            return $results;
        } else {
            shuffle($yetFollows);

            return $yetFollows;
        }
    }

    public function getAutoFollowAccountRandomSort($user_id)
    {
        $accounts = DB::select(
            'SELECT 
                * 
            from follow_accounts'
        );

        $param = [
            'userId' => $user_id,
        ];

        $nickname = DB::select(
            'SELECT 
                `nickname`
            from users WHERE id = :userId',
            $param
        );

        $currentFollows = Twitter::getAuthConnection($user_id)->get('friends/ids', array(
            'screen_name' => $nickname,
        ));

        $yetFollows = [];
        // // まだフォローしていないアカウントを選別してそれを返す
        foreach ($accounts as $target) {
            if (!in_array($target->twitter_id, $currentFollows->ids)) {
                array_push($yetFollows, $target);
            }
        }
        shuffle($yetFollows);

        $yetFollow = $yetFollows[0];

        return $yetFollow;
    }
}
