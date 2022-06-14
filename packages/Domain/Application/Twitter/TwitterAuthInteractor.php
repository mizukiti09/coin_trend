<?php

namespace packages\Domain\Application\Twitter;

use Exception;
use App\Facades\Twitter;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use packages\UseCase\Twitter\Auth\TwitterAuthUseCaseInterface;
use packages\Domain\Domain\User\TwitterAuth\UserTwitterAuthRepositoryInterface;

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
        try {
            return Socialite::driver('twitter')->redirect();
        } catch (Exception $e) {
            return redirect()->route('twitter.follow.follow_wait');
        }
    }
    /**
     * Twitterからユーザー情報を取得(Callback先)
     */
    public function loginHandleProviderCallback()
    {

        try {
            $twitterAuth = Twitter::connectUserAuth();

            $this->twitterAuthRepository->save($twitterAuth);
            Log::info('Twitterから取得しました。', ['user' => $twitterAuth]);
            Auth::login(Auth::user());
            return redirect()->route('twitter.follow');
        } catch (Exception $e) {
            return redirect()->route('twitter.follow.follow_wait');
        }
    }

    // twitter　認証解除
    public function logoutHandle()
    {
        $this->twitterAuthRepository->logout();
    }
}
