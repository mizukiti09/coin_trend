<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow_Account extends Model
{
    protected $table = 'follow_accounts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'twitter_id',
        'name',
        'screen_name',
        'description',
        'friends_count',
        'followers_count',
        'profile_image_url',
        'full_text',
        'media_url_https',
    ];
}
