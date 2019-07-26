<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 5:43 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Goals extends Model
{
    protected $table = 'goals';
    protected $fillable = [
        'id', 'goal_question', 'lang'
    ];
    protected $hidden = [];
}