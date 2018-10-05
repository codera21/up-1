<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Config;
use Date;

class MaterialSubGroup extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'material_sub_group';

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
        'group_id', 'title', 'slug', 'price', 'payment_type', 'enable_payment_button', 'paypal_plan_id'
    ];


    /**
     * Get the group that owns the sub group.
     */
    public function materialGroups()
    {
        return $this->belongsTo('App\Models\MaterialGroup','group_id','id');
    }

    /**
     * Get materials associated with sub group
     */
    public function material()
    {
        return $this->hasMany('App\Models\Material', 'sub_group_id', 'id');
    }

    /**
     * Set enable_payment_button
     * 
     * @param string $value
     */ 
    public function setEnablePaymentButtonAttribute($value = null)
    {   
        if($value == null) {
           $this->attributes['enable_payment_button']  = 'NO';
        } else {
            $this->attributes['enable_payment_button'] = $value;
        }
        
    }
    
}
