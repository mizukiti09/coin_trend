<?php

namespace packages\Domain\Domain\Twitter\FollowAccounts;

interface TwitterFollowAccountsRepositoryInterface
{
    // crone で定期的にフォローアカウントの保存 or 更新
    public function cronFollowAccountsSave($page);

    // 単一フォロー用のアカウントをランダムで取得
    public function getFollowAccountsRandomSort();

    // 自動フォロー用のアカウントを取得
    public function getAutoFollowAccountRandomSort($user_id);
}
