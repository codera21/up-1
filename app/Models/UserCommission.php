<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Config;
use Date;

class UserCommission extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_commissions';

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
        'receiver_id', 'payer_id', 'payment_id', 'payment', 'commission_amount', 'level_id', 'transaction_type', 'opening_balance', 'closing_balance'    ];



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


    /**
     * Get the subscriber/user that owns the commission
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','receiver_id','id');
    }
    
}
