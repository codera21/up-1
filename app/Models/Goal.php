<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Goal extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'goals';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates      = ['created_at', 'updated_at'];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['goal_question' , 'lang'];

}
