<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Validator::extend('array_field', function($attribute, $value, $parameters, $validator) {
            $data = $value;

            dd($data);

            if( ! is_array($data)){
                return true;
            }
            return count($data) >= $parameters[0];
        }, 'Please select at least one value for :attribute');

        Validator::extend('name', function($attribute, $value, $parameters, $validator) {
            if(!empty($value)){
                return preg_match("/^[a-zA-Z0-9 .-]+$/", $value);
            } else {
                return true;
            }
        }, 'The :attribute is invalid name (Only letters, numbers, dot and dash are allowed)');

        Validator::extend('address', function($attribute, $value, $parameters, $validator) {
            if(!empty($value)){
                return preg_match("/^[a-zA-Z 0-9.,-]+$/", $value);
            } else {
                return true;
            }
        }, 'The :attribute is invalid address (Only letters, numbers, dot, comma and dash are allowed)');

        Validator::extend('city', function($attribute, $value, $parameters, $validator) {
            if(!empty($value)){
                return preg_match("/^[a-zA-Z .-]+$/", $value);
            } else {
                return true;
            }
        }, 'The :attribute is invalid city (Only letters, dot and dash are allowed)');

        Validator::extend('zip', function($attribute, $value, $parameters, $validator) {
            if(!empty($value)){
                return preg_match("/^[0-9]+$/", $value);
            } else {
                return true;
            }
        }, 'The :attribute is invalid zip code (Only numbers are allowed)');

        Validator::extend('phone', function($attribute, $value, $parameters, $validator) {
            if(!empty($value)){
                return preg_match("/^[0-9]+$/", $value);
            } else {
                return true;
            }
        }, 'The :attribute is invalid phone number (Only numbers are allowed)');

        Validator::extend('slug', function($attribute, $value, $parameters, $validator) {
            if(!empty($value)){
                return preg_match("/^[a-zA-Z 0-9\/-]+$/", $value);
            } else {
                return true;
            }
        }, 'The :attribute is invalid slug (Only letters, numbers, slash and dash)');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
