<?php  namespace App\Libs;
use Config;
use Carbon;

class Date extends Carbon
{
    /**
     * Format the instance as site date
     *
     * @return string
     */
    public function toSite()
    {
        return $this->format(Config::get('settings.site_datetime_format'));
    }
    
    /**
     * Format the instance as database date
     *
     * @return string
     */
    public function toDatabase()
    {
        return $this->format(Config::get('settings.database_datetime_format'));
    }
    
    /**
     * Get file name with date and time
     * 
     * @param type $file
     * @return string
     */
    public static function filename($file)
    {
        $info = pathinfo($file);
        $dt = static::now();
        $postfix = $dt->format(Config::get('settings.file_datetime_format'));
        if(isset($info['extension']) and !empty($info['extension']))
        {
            $filename = $info['filename'].'_'.$postfix.'.'.$info['extension'];
        } else {
            $filename = $info['filename'].'_'.$postfix;
        }
        
        return $filename;
    }
    
}
