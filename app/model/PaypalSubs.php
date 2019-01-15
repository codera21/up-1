<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 7:49 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class PaypalSubs extends Model
{
    protected $table = 'paypal_subscription';
    protected $fillable = [
        'id', 'user_id', 'customer_profile_id', 'status', 'created_at'
    ];
    protected $hidden =[];
}