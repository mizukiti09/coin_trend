<?php

namespace packages\Domain\Domain\User\TwitterAuth;

interface UserTwitterAuthRepositoryInterface
{
    /**
     * @param $twitterAuth
     */
    public function save($twitterAuth);

    public function find();

    public function logout();

    // ユーザーのアクセストークン取得
    public function getAccessToken($user_id);

    // ユーザーのアクセストークンシークレット取得
    public function getAccessTokenSecret($user_id);
}
