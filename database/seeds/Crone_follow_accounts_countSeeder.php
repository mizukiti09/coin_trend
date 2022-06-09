<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Crone_follow_accounts_countSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('crone_follow_accounts_count')->insert([
            'count' => 1,
        ]);
    }
}
