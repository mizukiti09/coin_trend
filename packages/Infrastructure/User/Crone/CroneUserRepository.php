<?php

namespace packages\Infrastructure\User\Crone;

use Illuminate\Support\Facades\DB;
use packages\Domain\Domain\User\Crone\CroneUserRepositoryInterface;

class CroneUserRepository implements CroneUserRepositoryInterface
{
    public function getCroneUserId()
    {
        $onUsersId = DB::table('users')
            ->where('auto_follow_flg', 1)
            ->pluck('id');

        return $onUsersId;
    }
}
