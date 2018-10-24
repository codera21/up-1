<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Config;
use Date;

class Comment extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_comments';

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
    protected $dates      = ['created_at', 'updated_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'comments', 'commenting_user_id'
    ];



    /**
     * Get Comments User
     */
    public function commentingUser()
    {
        return $this->belongsTo('App\Models\User', 'commenting_user_id', 'id');
    }
    
    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        if($this->attributes['created_at'] != null){
            return Date::parse($this->attributes['created_at'])->format(Config::get('settings.site_date_format'));
        }
    }
}
