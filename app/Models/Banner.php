<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Config;
use Date;

class Banner extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ads_banners_pages';

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
        'page', 'title', 'banner_728_90', 'see_more_ads', 'see_more_text', 'banner_300_250', 'banner_160_600', 'text_banners'
    ];

    

    /**
     * Set 728_90_banner
     * 
     * @param string $value
     */ 
    public function setBanner72890Attribute($value = null)
    {   
        if($value == null) {
           $this->attributes['banner_728_90']  = 'NO';
        } else {
            $this->attributes['banner_728_90'] = $value;
        }
        
    }

    /**
     * Set see more ads
     * 
     * @param string $value
     */ 
    public function setSeeMoreAdsAttribute($value = null)
    {   
        if($value == null) {
           $this->attributes['see_more_ads']  = 'NO';
        } else {
            $this->attributes['see_more_ads'] = $value;
        }
        
    }
    
    /**
     * Set see more text
     * 
     * @param string $value
     */ 
    public function setSeeMoreTextAttribute($value = null)
    {   
        if($value == null) {
           $this->attributes['see_more_text']  = 'NO';
        } else {
            $this->attributes['see_more_text'] = $value;
        }
        
    }

    /**
     * Set 300_250_banner
     * 
     * @param string $value
     */ 
    public function setBanner300250Attribute($value = null)
    {   
        if($value == null) {
           $this->attributes['banner_300_250']  = 'NO';
        } else {
            $this->attributes['banner_300_250'] = $value;
        }
        
    }

    /**
     * Set text_banner
     * 
     * @param string $value
     */ 
    public function setTextBannersAttribute($value = null)
    {   
        if($value == null) {
           $this->attributes['text_banners']  = 'NO';
        } else {
            $this->attributes['text_banners'] = $value;
        }
        
    }
}
