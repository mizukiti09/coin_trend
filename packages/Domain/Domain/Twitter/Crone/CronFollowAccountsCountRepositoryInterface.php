<?php

namespace packages\Domain\Domain\Twitter\Crone;

interface CronFollowAccountsCountRepositoryInterface
{
    // cron_follow_accounts_countテーブルからカウント数を取得
    public function getCount();

    // cron_follow_accounts_countのカウント数を1増やす
    public function incrementCount();

    // cron_follow_accounts_countテーブルのカウントをリセット
    public function resetCount();
}
