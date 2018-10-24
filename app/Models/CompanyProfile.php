<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'name',
        'company_moto',
        'description',
        'address',
        'contact',
        'email',
        'photo_url'
    ];
}
