<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 7:56 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class UserCommission extends Model
{
    protected $table = 'user_commission';
    protected $fillable = [
        'id', 'receiver_id', 'payer_id', 'payment_id', 'payment', 'level_id', 'transaction_type',
        'commission_amount', 'opening_balance', 'closing_balance', 'created_at', 'updated_at'
    ];
    protected $hidden = [];
}