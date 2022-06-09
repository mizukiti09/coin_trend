<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('twitter_id');
            $table->string('name');
            $table->string('screen_name');
            $table->string('description');
            $table->integer('friends_count');
            $table->integer('followers_count');
            $table->string('profile_image_url');
            $table->text('full_text')->nullable();
            $table->string('media_url_https')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follow_accounts');
    }
}
