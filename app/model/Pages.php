<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 7:21 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';
    protected $fillable = [
        'id', 'status', 'parent_id', 'title', 'slug', 'content', 'left_sidebar_block_id', 'right_sidebar_block_id', 'type',
        'layout', 'created_at', 'updated_at', 'language'
    ];
    protected $hidden = [];
}