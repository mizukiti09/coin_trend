<?php

namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\UserComposer;
use packages\Infrastructure\Coin\CoinTweetRepository;
use App\Http\Presenters\Twitter\TwitterFollowPresenter;
use App\Http\ViewComposers\TwitterFollowAccountComposer;
use packages\Infrastructure\User\Crone\CroneUserRepository;
use packages\Domain\Domain\Coin\CoinTweetRepositoryInterface;
use packages\Domain\Application\Twitter\TwitterAuthInteractor;
use packages\UseCase\Twitter\Auth\TwitterAuthUseCaseInterface;
use packages\Domain\Application\Twitter\TwitterFollowInteractor;
use packages\Domain\Domain\User\Crone\CroneUserRepositoryInterface;
use packages\UseCase\Twitter\Follow\TwitterFollowPresenterInterface;
use packages\UseCase\Twitter\Follow\TwitterAutoFollowUseCaseInterface;
use packages\Infrastructure\User\TwitterAuth\UserTwitterAuthRepository;
use packages\UseCase\Twitter\Follow\TwitterClickFollowUseCaseInterface;
use packages\Infrastructure\User\TwitterAuth\UserTwitterFollowRepository;
use packages\Infrastructure\Twitter\Crone\CronFollowAccountsCountRepository;
use packages\Domain\Domain\User\TwitterAuth\UserTwitterAuthRepositoryInterface;
use packages\Domain\Domain\User\TwitterAuth\UserTwitterFollowRepositoryInterface;
use packages\Infrastructure\Twitter\FollowAccounts\TwitterFollowAccountsRepository;
use packages\Domain\Domain\Twitter\Crone\CronFollowAccountsCountRepositoryInterface;
use packages\Domain\Domain\Twitter\FollowAccounts\TwitterFollowAccountsRepositoryInterface;

class TwitterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerForFacade();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composers([
            UserComposer::class                 => 'pages.*',
            TwitterFollowAccountComposer::class => 'pages.twitter.follow.*',
        ]);
    }

    private function registerForFacade()
    {
        $this->app->bind('twitter', 'App\Services\Twitter');
        $this->app->bind('coin', 'App\Services\Coin');
    }
    /**
     * 登録する必要のある全コンテナ結合
     *
     * @var array
     */
    public $bindings = [
        UserTwitterAuthRepositoryInterface::class         => UserTwitterAuthRepository::class,
        UserTwitterFollowRepositoryInterface::class       => UserTwitterFollowRepository::class,
        TwitterFollowPresenterInterface::class            => TwitterFollowPresenter::class,
        TwitterAuthUseCaseInterface::class                => TwitterAuthInteractor::class,
        TwitterClickFollowUseCaseInterface::class         => TwitterFollowInteractor::class,
        TwitterAutoFollowUseCaseInterface::class          => TwitterFollowInteractor::class,
        TwitterFollowAccountsRepositoryInterface::class   => TwitterFollowAccountsRepository::class,
        CronFollowAccountsCountRepositoryInterface::class => CronFollowAccountsCountRepository::class,
        CoinTweetRepositoryInterface::class               => CoinTweetRepository::class,
        CroneUserRepositoryInterface::class               => CroneUserRepository::class,
    ];
}
