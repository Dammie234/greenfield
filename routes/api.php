<?php

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('forgot-password', 'AuthController@postEmail');

});
Route::get('/profile/{id}', 'BiodataController@profile');
Route::get('/tenant-profile/{id}', 'BiodataController@tenantProfile');
Route::get('/tenant-landlord/{id}', 'BiodataController@tenantLandlord');
Route::patch('/profile/{user_id}', 'BiodataController@updateProfile');

Route::apiResource('/property', 'PropertyController');
Route::get('/properties/{user_id}', 'PropertyController@index');

Route::apiResource('/apartment', 'ApartmentController');
Route::get('/apartments/{user_id}', 'ApartmentController@index');

Route::apiResource('/tenant', 'TenantController');
Route::get('/tenants/{user_id}', 'TenantController@index');

Route::get('/dashboard-landlord/{user_id}', 'HomeController@dashboardLandlord');
Route::get('/dashboard-admin', 'HomeController@dashboardAdmin');
Route::get('/landlords', 'HomeController@landlords');
Route::get('/user-debts/{user_id}', 'HomeController@userDebts');
Route::get('/debts', 'HomeController@allDebts');

Route::post('/service', 'ServiceController@store');
Route::get('/service', 'ServiceController@index');
Route::get('/unpaid-services/{user_id}', 'ServiceController@unpaidServices');
Route::get('/few-unpaid-services/{user_id}', 'ServiceController@fewUnpaidServices');
Route::get('/unpaid-monthly-services/{id}', 'ServiceController@monthlyServices');
Route::get('/one-off-services/{id}', 'ServiceController@oneOffServices');
