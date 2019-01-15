<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'id',
        'parent_id',
        'first_name',
        'last_name',
        'photo',
        'username',
        'email',
        'password',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'country',
        'timezone',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'snapchat_url',
        'skype_id',
        'google_hangout_id',
        'bio',
        'is_admin',
        'is_active',
        'prevent_users_to_see_email',
        'prevent_users_to_see_phone',
        'prevent_users_to_comments_messages',
        'verified',
        'not_now',
        'ban',
        'ban_date'
    ];
    protected $hidden = [];

}