<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 7:29 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'id', 'user_id', 'bank_slip_no', 'bank_id', 'payment_profile_id', 'paypal_plan_id', 'payment_mode',
        'payment_type', 'paid_for', 'amount_paid', 'status', 'created_at', 'update_at'
    ];
    protected $hidden = [];
}