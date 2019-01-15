<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 5:52 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';
    protected $fillable = [
        'id', 'group_id', 'sub_group_id', 'title', 'slug', 'description', 'material_type', 'video_url', 'course_url',
        'price', 'payment_type', 'enable_payment_button', 'paypal_plan_id'
    ];
    protected $hidden = [];
}