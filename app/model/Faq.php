<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 5:33 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Faq extends  Model
{
    protected $table = 'faqs';
    protected $fillable = [
      'id', 'question', 'slug', 'answer', 'lang'
    ];
    protected $hidden = [];
}