<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';
    protected $fillable = [
        'id', 'group_id', 'sub_group_id', 'title', 'slug', 'description', 'material_type', 'embed', 'course_url',
        'price', 'payment_type', 'enable_payment_button'
    ];
    protected $hidden = [];
}