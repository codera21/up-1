<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Config;
use Date;

class News extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'news';

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = ['title', 'slug', 'description', 'lang'];
}
