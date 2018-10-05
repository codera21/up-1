<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Config;
use Date;

class Page extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

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
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'parent_id', 'type', 'layout', 'left_sidebar_block_id',
        'right_sidebar_block_id', 'title', 'slug', 'content', 'language'
    ];

    /**
     * Get the route key for the model.
     * 
     * @return string
     */
    public function getRouteKeyName()
    {
       return 'slug';
    }
    
    /**
     * Get left side block
     */
    public function leftBlock()
    {
        return $this->belongsTo(self::class, 'left_sidebar_block_id');
    }

    /**
     * Get right side block
     */
    public function rightBlock()
    {
        return $this->belongsTo(self::class, 'right_sidebar_block_id');
    }

    /**
     * Get parent page
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Get sub page
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }


    /**
     * Get create at
     *
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        if($this->attributes['created_at'] != null){
            return Date::parse($this->attributes['created_at'])->format(Config::get('settings.site_date_format'));
        }
    }

    /**
     * Set left sidebar block id
     *
     * @param string $value
     */
    public function setLeftSidebarBlockIdAttribute($value = null)
    {
        if($this->attributes['layout'] == 'LEFT SIDEBAR' or $this->attributes['layout'] == 'LEFT & RIGHT SIDEBARS')
        {
           $this->attributes['left_sidebar_block_id'] = $value;
        }

    }

    /**
     * Set right sidebar block id
     *
     * @param string $value
     */
    public function setRightSidebarBlockIdAttribute($value = null)
    {
        if($this->attributes['layout'] == 'RIGHT SIDEBAR' or $this->attributes['layout'] == 'LEFT & RIGHT SIDEBARS')
        {
           $this->attributes['right_sidebar_block_id'] = $value;
        }

    }

    /**
     * Set parent_id
     *
     * @param string $value
     */
    public function setParentIdAttribute($value = null)
    {
        if($value != null and $value != '')
        {
           $this->attributes['parent_id'] = $value;
        }

    }

}
