<?php

namespace packages\UseCase\Twitter\Follow;

interface TwitterAutoFollowUseCaseInterface
{
    /**
     * @param $user_id
     */
    public function autoFollowHandle($user_id);
}
