<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyPhoto extends Model
{
    protected $fillable =[
        'user_id',
        'photo_url'
    ];
}
