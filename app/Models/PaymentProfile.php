<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Config;
use Date;

class PaymentProfile extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payment_profiles';

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
        'user_id', 'customer_profile_id', 'customerpayment_profile_id', 'payment_type', 'card_no', 'card_exp_date',  'bank_name', 'bank_routing_no', 'bank_account_no', 'name', 'address', 'city', 'state', 'zip', 'phone', 'default', 'deleted',
    ];

    /**
     * Get the subscriber/user that owns the payment profile
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    
}
