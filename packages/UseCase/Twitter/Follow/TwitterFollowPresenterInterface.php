<?php

namespace packages\UseCase\Twitter\Follow;

use App\Facades\Twitter;

/**
 * Interface TwitterFollowPresenterInterface
 * @package packages\UseCase\Twitter\Follow
 */
interface TwitterFollowPresenterInterface
{
    /**
     * @return mixed
     */
    public function handle();
}
