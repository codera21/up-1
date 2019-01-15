<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 7:05 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'id', 'title', 'slug', 'description', 'created_at', 'updated_at', 'lang'
    ];
    protected $hidden = [];
}