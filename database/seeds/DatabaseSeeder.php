<?php

use CoinTweetsTableSeeder;
use Illuminate\Database\Seeder;
use Crone_follow_accounts_countSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CoinTweetsTableSeeder::class);
        $this->call(Crone_follow_accounts_countSeeder::class);
    }
}
