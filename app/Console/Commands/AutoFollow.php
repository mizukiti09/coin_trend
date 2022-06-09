<?php

namespace App\Console\Commands;

use App\Http\Controllers\Twitter\TwitterFollowController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use packages\Domain\Domain\User\Crone\CroneUserRepositoryInterface;
use packages\UseCase\Twitter\Follow\TwitterAutoFollowUseCaseInterface;
use packages\Domain\Domain\User\TwitterAuth\UserTwitterFollowRepositoryInterface;

class AutoFollow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:autoFollow';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '自動フォロ-';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(
        TwitterAutoFollowUseCaseInterface $useCase,
        CroneUserRepositoryInterface $croneRepository
    ) {
        $onUsersId = $croneRepository->getCroneUserId();
        if (!empty($onUsersId)) {
            foreach ($onUsersId as $onUserId) {
                $useCase->autoFollowHandle($onUserId);
            }
        } else {
            return;
        }
    }
}
