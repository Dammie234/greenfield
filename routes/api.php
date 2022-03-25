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
Route::group([

    'middleware' => 'auth:api',
    'prefix' => 'v1'

], function () {
    Route::get('/user/{token}', 'HomeController@user');
    Route::get('/check-user/{token}', 'HomeController@checkUser');
    Route::get('/dashboard-landlord/{token}', 'HomeController@dashboardLandlord');
    Route::get('/dashboard-admin', 'HomeController@dashboardAdmin');
    Route::get('/user-debts/{token}', 'HomeController@userDebts');
    Route::get('/debts', 'HomeController@allDebts');
    Route::get('/landlords', 'HomeController@landlords');

    Route::get('/few-unpaid-services/{token}', 'ServiceController@fewUnpaidServices');

    Route::get('/tenant-profile/{token}', 'BiodataController@tenantProfile');
    Route::get('/tenant-landlord/{id}', 'BiodataController@tenantLandlord');
    Route::get('/profile/{token}', 'BiodataController@profile');
    Route::get('/get-profile/{id}', 'BiodataController@getProfile');

    Route::get('/properties/{token}', 'PropertyController@index');
    Route::get('/property/{id}', 'PropertyController@show');
    Route::get('/user-properties/{id}', 'PropertyController@properties');

    Route::get('/apartments/{token}', 'ApartmentController@index');
    Route::get('/apartment/{id}', 'ApartmentController@show');
    Route::get('/user-apartments/{id}', 'ApartmentController@apartments');

    Route::get('/tenants/{token}', 'TenantController@index');
    Route::get('/user-tenants/{id}', 'TenantController@tenants');
    Route::get('/tenant/{user_id}', 'TenantController@show');

    Route::get('/unpaid-services/{token}', 'ServiceController@unpaidServices');
    Route::get('/service', 'ServiceController@index');
    Route::get('/unpaid-monthly-services/{id}', 'ServiceController@monthlyServices');
    Route::get('/cart', 'ServiceController@cart');
    Route::get('/empty-cart/{token}', 'ServiceController@emptyCart'); 
    Route::get('/monthly-cart/{token}', 'ServiceController@monthlyCart');
});


Route::patch('/profile/{token}', 'BiodataController@updateProfile');

Route::post('/property', 'PropertyController@store');
Route::patch('/property/{id}', 'PropertyController@update');
Route::delete('/property/{id}', 'PropertyController@destroy');


Route::post('/apartment', 'ApartmentController@store');
Route::patch('/apartment/{id}', 'ApartmentController@update');
Route::delete('/apartment/{id}', 'ApartmentController@destroy');

Route::post('/tenant', 'TenantController@store');
Route::patch('/tenant/{id}', 'TenantController@store');
Route::delete('/tenant/{id}', 'TenantController@destroy');



Route::post('/service', 'ServiceController@store');

Route::get('/one-off-services/{id}', 'ServiceController@oneOffServices');
Route::patch('/process-monthly-payment/{id}', 'ServiceController@processMonthlyPayment');



