<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 5:22 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class CompanyProfiles extends Model
{
    protected $table = 'companies_profiles';
    protected $fillable = [
        'id', 'name', 'company_moto', 'description', 'company_description_title', 'address', 'contact', 'email', 'company_image_title',
        'photo_url', 'user_id'
    ];
    protected $hidden =[];
}