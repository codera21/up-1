<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 4:24 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';
    protected $fillable = [
        'id', 'title', 'description', 'slug', 'lang'
    ];
    protected $hidden = [];
}