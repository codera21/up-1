<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 8:22 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class UserGoals extends Model
{
    protected $table = 'user_goals';
    protected $fillable = [
        'id', 'user_id', 'goal_id', 'user_answer', 'created_at', 'updated_at'
    ];
}