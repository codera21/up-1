<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 6:58 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = [
        'id', 'form_user_id', 'from_username', 'to_user_id', 'to_username', 'subject', 'message', 'deleted', 'readed', 'created_at',
        'updated_at'
    ];
    protected $hidden = [];
}