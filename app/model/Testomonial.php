<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/14/2019
 * Time: 5:49 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Testomonial extends Model
{
    protected $fillable = [
        'id', 'name', 'testomonial', 'user_id'
    ];
    protected $hidden = [];
}