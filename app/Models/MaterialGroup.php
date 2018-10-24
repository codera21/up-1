<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Config;
use Date;

class MaterialGroup extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'material_group';

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
        'title', 'slug', 'price', 'payment_type', 'enable_payment_button', 'paypal_plan_id','group_thumbnail_url', 'lang'
    ];

    /**
     * Get sub groups associated with group
     */
    public function materialSubGroups()
    {
        return $this->hasMany('App\Models\MaterialSubGroup', 'group_id', 'id');
    }

    /**
     * Get materials associated with group
     */
    public function material()
    {
        return $this->hasMany('App\Models\Material', 'group_id', 'id');
    }


    /**
     * Get payments associated with group
     */
    public function paymentDetails()
    {
        return $this->hasMany('App\Models\PaymentDetails', 'group_id', 'id');
    }

    /**
     * Get groups material's total amount
     */
    /*public function scopeDone($query)
    {
        return $query->where('done', 1);
        $list = Todolist::find(34);
$completedTasks = $list->tasks()->done(true)->get();
    }*/

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
