<?php

namespace packages\Domain\Domain\User\TwitterAuth;

use Illuminate\Contracts\Auth\Guard;

class TwitterAuthUser
{
    /**
     * @var int
     */
    private $twitter;
    /**
     * @var string
     */
    private $nickname;

    /**
     * @var string
     */
    private $profile_photo_path;

    /**
     * TwitterAuthUser constructor.
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->twitter = $auth->twitter;
        $this->nickname = $auth->nickname;
        $this->profile_photo_path = $auth->profile_photo_path;
    }

    /**
     * @return int
     */
    public function getTwitter(): int
    {
        return $this->twitter;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @return string
     */
    public function getProfile_photo_path(): string
    {
        return $this->profile_photo_path;
    }
}
