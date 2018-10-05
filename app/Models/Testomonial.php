<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testomonial extends Model
{
    protected $fillable = [
        'name',
        'testomonial',
        'user_id'
    ];
}
