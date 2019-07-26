<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 6:03 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class MaterialGroup extends Model
{
    protected $table = 'material_group';
    protected $fillable = [
        'id', 'title',
        'slug', 'price', 'payment_type',
        'enable_payment_button',
        'paypan_plan_id',
        'created_at',
        'updated_at',
        'group_thumbnail_url',
        'lang'
    ];
    protected $hidden = [];
}