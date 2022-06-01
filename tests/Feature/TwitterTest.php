<?php

namespace Tests\Feature;

use App\Facades\Twitter;
use function PHPUnit\Framework\assertEquals;
use Tests\TestCase;

class TwitterTest extends TestCase
{
    /**
     * @test
     * twitter認証ページへのリダイレクト
     */
    public function redirectToProviderTest()
    {

        // URLをコール
        $response = $this->get(route('login.twitter'));

        $response->assertStatus(302);

        $target = parse_url($response->headers->get('location'));
        // リダイレクト先ドメインの検証

        $this->assertEquals('api.twitter.com', $target['host']);

    }

}
