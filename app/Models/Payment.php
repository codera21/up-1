<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Config;
use Date;

class Payment extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payments';

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
        'user_id', 'bank_slip_no', 'bank_id', 'payment_profile_id', 'paypal_plan_id', 'payment_mode', 'amount_paid', 'payment_type', 'paid_for', 'status'
    ];

     /**
     * Get user that owns the payment
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    /**
     * Get bank that has the offline payment into
     */
    public function bank()
    {
        return $this->belongsTo('App\Models\Bank','bank_id','id');
    }

    /**
     * Get payments transaction
     */
    public function paymentDetails()
    {
        return $this->hasMany('App\Models\PaymentDetails', 'transaction_id', 'id');
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
