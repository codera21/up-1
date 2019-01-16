<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*$router->get('/', function () use ($router) {
    return $router->app->version();
});*/
$router->get('/', [
    'as' => '/', 'uses' => 'ExampleController@index'
]);
$router->get('users', [
    'as' => 'users', 'uses' => 'UserController@index'
]);
// Testomonial table
$router->group(['as' => 'testo', 'prefix' => 'testo'], function () use ($router) {
    $router->get('/', ['uses' => 'TestoController@index']);
    $router->get('/{id}', ['as' => '.testo', 'uses' => 'TestoController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'TestoController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'TestoController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'TestoController@delete']);
});
// about table Todo:test all json in postman form these route for create update and delete
$router->group(['as' => 'about', 'prefix' => 'about'], function () use ($router) {
    $router->get('/', ['uses' => 'AboutController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'AboutController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'AboutController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'AboutController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'AboutController@delete']);
});
// company photo table
$router->group(['as' => 'company_photo', 'prefix' => 'company_photo'], function () use ($router) {
    $router->get('/', ['uses' => 'CompanyPhotoController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'CompanyPhotoController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'CompanyPhotoController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'CompanyPhotoController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'CompanyPhotoController@delete']);
});
// company profile table
$router->group(['as' => 'company_profile', 'prefix' => 'company_profile'], function () use ($router) {
    $router->get('/', ['uses' => 'CompaniesProfileController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'CompaniesProfileController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'CompaniesProfileController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'CompaniesProfileController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'CompaniesProfileController@delete']);
});
// faqs table
$router->group(['as' => 'faqs', 'prefix' => 'faqs'], function () use ($router) {
    $router->get('/', ['uses' => 'FaqController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'FaqController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'FaqController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'FaqController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'FaqController@delete']);
});
// Goals table
$router->group(['as' => 'goals', 'prefix' => 'goals'], function () use ($router) {
    $router->get('/', ['uses' => 'GoalsController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'GoalsController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'GoalsController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'GoalsController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'GoalsController@delete']);
});
// Material table
$router->group(['as' => 'goals', 'prefix' => 'material'], function () use ($router) {
    $router->get('/', ['uses' => 'MaterialController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'MaterialController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'MaterialController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'MaterialController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'MaterialController@delete']);
});
// Material group table
$router->group(['as' => 'materialgroup', 'prefix' => 'material_group'], function () use ($router) {
    $router->get('/', ['uses' => 'MaterialGroupController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'MaterialGroupController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'MaterialGroupController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'MaterialGroupController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'MaterialGroupController@delete']);
});
//Material sub group table
$router->group(['as' => 'matrialsubgroup', 'prefix' => 'material_subgroup'], function () use ($router) {
    $router->get('/', ['uses' => 'MaterialGroupController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'MaterialSubGroupController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'MaterialSubGroupController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'MaterialSubGroupController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'MaterialSubGroupController@delete']);
});
// message table ashish 
$router->group(['as' => 'message', 'prefix' => 'message'], function () use ($router) {
    $router->get('/', ['uses' => 'MessageController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'MessageController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'MessageController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'MessageController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'MessageController@delete']);
});
//news
$router->group(['as' => 'news', 'prefix' => 'news'], function () use ($router) {
    $router->get('/', ['uses' => 'NewsController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'NewsController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'NewsController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'NewsController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'NewsController@delete']);
});
// offline pay table
$router->group(['as' => 'offlinepay', 'prefix' => 'offline_pay'], function () use ($router) {
    $router->get('/', ['uses' => 'OfflinePayController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'OfflinePayController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'OfflinePayController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'OfflinePayController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'OfflinePayController@delete']);
});
// page table asasasasass
$router->group(['as' => 'pages', 'prefix' => 'pages'], function () use ($router) {
    $router->get('/', ['uses' => 'OfflinePayController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'PagesController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'PagesController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'PagesController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'PagesController@delete']);
});
// payments table
$router->group(['as' => 'payments', 'prefix' => 'payments'], function () use ($router) {
    $router->get('/', ['uses' => 'PaymentsController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'PaymentsController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'PaymentsController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'PaymentsController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'PaymentsController@delete']);
});
// payments_details table
$router->group(['as' => 'paymentsdetails', 'prefix' => 'payments_details'], function () use ($router) {
    $router->get('/', ['uses' => 'PaymentsDetailsController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'PaymentsDetailsController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'PaymentsDetailsController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'PaymentsDetailsController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'PaymentsDetailsController@delete']);
});
// paypal subscription table
$router->group(['as' => 'paypal_sub', 'prefix' => 'paypal_sub'], function () use ($router) {
    $router->get('/', ['uses' => 'PaypalSubscriptionController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'PaypalSubscriptionController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'PaypalSubscriptionController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'PaypalSubscriptionController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'PaypalSubscriptionController@delete']);
});
// use r commission table qdasdsadasd
$router->group(['as' => 'usercommission', 'prefix' => 'usercommission'], function () use ($router) {
    $router->get('/', ['uses' => 'UserCommissionController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'UserCommissionController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'UserCommissionController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'UserCommissionController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'UserCommissionController@delete']);
});
// user goal table google  done is added asdf
$router->group(['as' => 'user_goals', 'prefix' => 'user_goals'], function () use ($router) {
    $router->get('/', ['uses' => 'UserGoalsController@index']);
    $router->get('/{id}', ['as' => '.about', 'uses' => 'UserGoalsController@getbyid']);
    $router->post('/create', ['as' => '.create', 'uses' => 'UserGoalsController@create']);
    $router->put('update/{id}', ['as' => '.update', 'uses' => 'UserGoalsController@update']);
    $router->delete('/delete/{id}', ['as' => '.delete', 'uses' => 'UserGoalsController@delete']);
});
