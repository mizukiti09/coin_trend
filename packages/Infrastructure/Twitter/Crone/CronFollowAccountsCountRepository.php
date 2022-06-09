<?php

namespace packages\Infrastructure\Twitter\Crone;

use Illuminate\Support\Facades\DB;
use packages\Domain\Domain\Twitter\Crone\CronFollowAccountsCountRepositoryInterface;

class CronFollowAccountsCountRepository implements CronFollowAccountsCountRepositoryInterface
{
    public function getCount()
    {
        $result = DB::table('crone_follow_accounts_count')
            ->select('count')
            ->get()
            ->first();

        return $result->count;
    }

    public function incrementCount()
    {
        DB::table('crone_follow_accounts_count')
            ->increment('count');
    }

    public function resetCount()
    {
        DB::table('crone_follow_accounts_count')
            ->update([
                'count' => 1,
            ]);
    }
}
