<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Config;
use Date;

class Message extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'messages';

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
        'from_user_id', 'from_username', 'to_user_id', 'to_username', 'subject', 'message', 'deleted', 'readed'
    ];

    /**
     * Get the user who sent the message
     */
    public function fromUser()
    {
        return $this->belongsTo('App\Models\User','from_user_id','id');
    }

    /**
     * Get the user who receive the message
     */
    public function toUser()
    {
        return $this->belongsTo('App\Models\User','to_user_id','id');
    }

    

    /**
     * Set deleted
     * 
     * @param string $value
     */ 
    public function setDeletedAttribute($value = null)
    {   
        if($value == null) {
           $this->attributes['deleted']  = 'NO';
        } else {
            $this->attributes['deleted'] = $value;
        }
        
    }

    /**
     * Set readed
     * 
     * @param string $value
     */ 
    public function setReadedAttribute($value = null)
    {   
        if($value == null) {
           $this->attributes['readed']  = 'NO';
        } else {
            $this->attributes['readed'] = $value;
        }
        
    }

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        if($this->attributes['created_at'] != null){
            return Date::parse($this->attributes['created_at'])->format(Config::get('settings.site_datetime_format'));
        }
    }
    
}
