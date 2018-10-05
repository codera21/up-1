<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Config;
use Date;

class PaymentDetails extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payments_details';

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
    protected $dates      = ['created_at', 'updated_at', 'start_date', 'end_date'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'group_id', 'sub_group_id', 'material_id', 'subscription_fee', 'start_date', 'end_date', 'amount', 'discount', 'transaction_id'
    ];

     /**
     * Get user that owns the order
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    /**
     * Get transaction head
     */
    public function payments()
    {
        return $this->hasOne('App\Models\Payment', 'id', 'transaction_id');
    }

    /**
     * Get payments materials group
     */
    public function materialGroup()
    {
        return $this->belongsTo('App\Models\MaterialGroup', 'group_id', 'id');
    }

    /**
     * Get payments materials sub group
     */
    public function materialSubGroup()
    {
        return $this->belongsTo('App\Models\MaterialSubGroup', 'sub_group_id', 'id');
    }

    /**
     * Get payments materials
     */
    public function material()
    {
        return $this->belongsTo('App\Models\Material', 'material_id', 'id');
    }

    /**
     * Get start date
     *
     * @return string
     */
    public function getStartDateAttribute()
    {
        if($this->attributes['start_date'] != null){
            return Date::parse($this->attributes['start_date'])->format(Config::get('settings.site_datetime_format'));
        }
    }

    /**
     * Get end date
     *
     * @return string
     */
    public function getEndDateAttribute()
    {
        if($this->attributes['end_date'] != null){
            return Date::parse($this->attributes['end_date'])->format(Config::get('settings.site_datetime_format'));
        }
    }
    
}
