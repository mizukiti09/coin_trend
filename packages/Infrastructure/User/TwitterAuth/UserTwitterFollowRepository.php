<?php

namespace packages\Infrastructure\User\TwitterAuth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use packages\Domain\Domain\User\TwitterAuth\UserTwitterFollowRepositoryInterface;

class UserTwitterFollowRepository implements UserTwitterFollowRepositoryInterface
{
    public function followCountSave($user_id)
    {
        DB::table('users')
            ->where('id', $user_id)
            ->increment('follow_count');
    }

    public function userFollowCountResetBy24HoursAgo($user_id)
    {

        Log::info(gettype($user_id));
        // follow_countが１の時のUnixタイム
        $result = DB::table('users')
            ->where('id', $user_id)
            ->select('follow_count_first_unix_time')
            ->get()
            ->first();
        $followCountFirstUnixTime = $result->follow_count_first_unix_time;

        // // 現在のUnixタイム
        $currentTime = time();

        if ($followCountFirstUnixTime !== null) {
            // 86400 は 1日あたりのUnixタイム
            if (($followCountFirstUnixTime + 86400) < $currentTime) {
                DB::table('users')
                    ->where('id', $user_id)
                    ->update([
                        'follow_count' => 0,
                        'follow_count_first_unix_time' => time(),
                    ]);
            }
        } else {
            //  ユーザーが初めてフォローする時は$followCountFirstUnixTime は nullになるので
            // こちらの処理がされる
            DB::table('users')
                ->where('id', $user_id)
                ->update([
                    'follow_count_first_unix_time' => time(),
                ]);
        }
    }

    public function followCountUpperCheck($user_id)
    {
        $result = DB::table('users')
            ->where('id', $user_id)
            ->select('follow_count')
            ->get()
            ->first();
        $followCount = $result->follow_count;

        if ($followCount < 1000) {
            return true;
        } else {
            return false;
        }
    }
}
