<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Material extends Model implements Transformable
{

    use TransformableTrait;

    protected $table = 'material';

    public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
        'group_id', 'sub_group_id', 'title', 'slug', 'description', 'material_type', 'embed', 'course_url', 'price', 'payment_type', 'enable_payment_button', 'paypal_plan_id', 'thumbnail_url'
    ];

    public function materialSubGroups()
    {
        return $this->belongsTo('App\Models\MaterialSubGroup', 'sub_group_id', 'id');
    }

    public function materialGroups()
    {
        return $this->belongsTo('App\Models\MaterialGroup', 'group_id', 'id');
    }

    public function setEnablePaymentButtonAttribute($value = null)
    {
        if ($value == null) {

            $this->attributes['enable_payment_button'] = 'NO';

        } else {

            $this->attributes['enable_payment_button'] = $value;

        }
    }
}
