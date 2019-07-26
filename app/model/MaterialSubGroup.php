<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 6:14 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MaterialSubGroup extends Model
{
    protected $table = 'material_sub_group';
    protected $fillable = [
        'id',
        'group_id', 'title', 'slug', 'price', 'payment_type', 'enable_payment_button', 'paypal_plan_id',
        'created_at', 'updated_at'
    ];
    protected $hidden = [];
}