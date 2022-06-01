<?php

namespace packages\UseCase\Twitter\Follow;

interface TwitterClickFollowUseCaseInterface
{
    /**
     * @param $nickname, $user_id
     */
    public function followHandle($nickname, $user_id);
}
