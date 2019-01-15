<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 7:36 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class PaymentsDetails extends Model
{
    protected $table = 'payments_details';
    protected $fillable = [
        'id', 'user_id', 'group_id', 'sub_group_id', 'material_id', 'subscription_fee', 'start_date',
        'end_date', 'amount', 'discount', 'transcation_id', 'created_at', 'updated_at'
    ];
    protected $hidden = [];
}