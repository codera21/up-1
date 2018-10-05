<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
/*use Kodeine\Acl\Traits\HasRole;
use App\Models\Traits\FormatDateTrait;
use App\Notifications\Register;*/
use App\Notifications\PasswordReset;

use Config;
use Date;

class User extends Authenticatable
{
    use Notifiable, TransformableTrait;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
        'google_hangout_url',
        'bio',
        'is_admin',
        'is_active',
        'prevent_users_to_see_email',
        'prevent_users_to_see_phone',
        'prevent_users_to_comments_messages'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Get parent user
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Get sub users
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /**
     * Get Comments
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'user_id', 'id');
    }

    /**
     * Get Golas
     */
    public function goals()
    {
        return $this->hasMany('App\Models\UserGoal', 'user_id', 'id');
    }

    /**
     * Get Payment Profiles
     */
    public function paymentProfiles()
    {
        return $this->hasMany('App\Models\PaymentProfile', 'user_id', 'id');
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->email;
    }

    /**
     * Send the registration notification.
     *
     * @return void
     */
    public function sendRegisterNotification()
    {
        $this->notify(new Register());
    }


    /**
     * Send the password reset notification.
     *
     * @param  string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }

    /**
     * Set password (bcrypt)
     *
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $value;
    }

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        if ($this->attributes['created_at'] != null) {
            return Date::parse($this->attributes['created_at'])->format(Config::get('settings.site_date_format'));
        }
    }


    /**
     * Set is Admin
     *
     * @param string $value
     */
    public function setActiveAttribute($value = null)
    {
        if ($value == null) {
            $this->attributes['is_admin'] = 'NO';
        } else {
            $this->attributes['is_admin'] = $value;
        }

    }


    /**
     * Set user can view email
     *
     * @param string $value
     */
    public function setPreventUsersToSeeEmailAttribute($value = null)
    {
        if ($value == null) {
            $this->attributes['prevent_users_to_see_email'] = 'NO';
        } else {
            $this->attributes['prevent_users_to_see_email'] = $value;
        }

    }

    /**
     * Set user can view phone
     *
     * @param string $value
     */
    public function setPreventUsersToSeePhoneAttribute($value = null)
    {
        if ($value == null) {
            $this->attributes['prevent_users_to_see_phone'] = 'NO';
        } else {
            $this->attributes['prevent_users_to_see_phone'] = $value;
        }

    }

    /**
     * Set user can add comments or messages
     *
     * @param string $value
     */
    public function setPreventUsersToCommentsMessagesAttribute($value = null)
    {
        if ($value == null) {
            $this->attributes['prevent_users_to_comments_messages'] = 'NO';
        } else {
            $this->attributes['prevent_users_to_comments_messages'] = $value;
        }

    }

    public function getFullnameAttribute()
    {
        return 'ashish';
    }


}
