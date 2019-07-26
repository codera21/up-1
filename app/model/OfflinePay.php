<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 7:13 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class OfflinePay extends Model
{
    protected $table = 'offline_pay';
    protected $fillable = [
        'id', 'name_of_subscriber', 'country', 'bank_slip_no', 'amount_paid', 'payment_type', 'account_no', 'receipt_photo'
    ];
    protected $hidden = [];
}