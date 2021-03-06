<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Config;
use Date;

class Level extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'levels';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

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
    protected $fillable = [
        'level_title', 'level_percentage', 'active'
    ];

    /**
     * Set active
     * 
     * @param string $value
     */ 
    public function setActiveAttribute($value = null)
    {   
        if($value == null) {
           $this->attributes['active']  = 'NO';
        } else {
            $this->attributes['active'] = $value;
        }
        
    }
    
}
