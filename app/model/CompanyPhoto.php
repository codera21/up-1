<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 5:00 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class CompanyPhoto extends Model
{
    protected $table = 'companies_photo';
    protected $fillable = [
        'id', 'name', 'photo_url', 'pic_url', 'user_id', 'created_at', 'updated_at'
    ];
    protected $hidden = [];
}