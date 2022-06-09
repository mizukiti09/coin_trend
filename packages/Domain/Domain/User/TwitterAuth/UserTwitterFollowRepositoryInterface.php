<?php

namespace packages\Domain\Domain\User\TwitterAuth;

interface UserTwitterFollowRepositoryInterface
{
    /**
     * @param $user_id
     */
    // フォローした数を１ずつcountする
    public function followCountSave($user_id);

    /**
     * @param $user_id
     */
    // follow_count_first_unit_timeから24時間経っていたら
    // follow_count を0 に更新
    // follow_count_first_unit_time を現在のUnixタイムに更新
    public function userFollowCountResetBy24HoursAgo($user_id);

    /**
     * @param $user_id
     */
    // 1日のフォロー上限のチェックをする(1日にフォローできる上限が1000フォロー)
    public function followCountUpperCheck($user_id);

    // 自動フォローフラグ取得
    public function getAutoFollowFlg();

    /**
     * @param $user_id
     */
    // 自動フォローフラグを1にする
    public function updateAutoFollowFlgTrue($user_id);

    /**
     * @param $user_id
     */
    // 自動フォローフラグを0にする
    public function updateAutoFollowFlgFalse($user_id);
}
