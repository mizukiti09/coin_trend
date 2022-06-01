<?php

namespace packages\Domain\Application\Twitter;

use App\Facades\Twitter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use packages\Domain\Domain\User\TwitterAuth\UserTwitterAuthRepositoryInterface;
use packages\UseCase\Twitter\Auth\TwitterAuthUseCaseInterface;

class TwitterAuthInteractor implements TwitterAuthUseCaseInterface
{
    /**
     * @var UserTwitterAuthRepositoryInterface
     */
    private $twitterAuthRepository;

    public function __construct(UserTwitterAuthRepositoryInterface $twitterAuthRepository)
    {
        $this->twitterAuthRepository = $twitterAuthRepository;
    }

    /**
     * Twitterの認証ページヘユーザーをリダイレクト
     *
     * @return \Illuminate\Http\Response
     */
    public function loginRedirectProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }
/**
 * Twitterからユーザー情報を取得(Callback先)
 */
    public function loginHandleProviderCallback()
    {
        $twitterAuth = Twitter::connectUserAuth();

        $this->twitterAuthRepository->save($twitterAuth);
        Log::info('Twitterから取得しました。', ['user' => $twitterAuth]);
        Auth::login(Auth::user());
        return redirect()->route('twitter.follow');
    }

    // twitter　認証解除
    public function logoutHandle()
    {
        $this->twitterAuthRepository->logout();

    }
}
