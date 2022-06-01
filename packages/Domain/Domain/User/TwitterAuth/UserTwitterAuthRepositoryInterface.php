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
}
