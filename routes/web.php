<?php

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile');
    Route::post('/profile/password', 'HomeController@changePassword');

    Route::prefix('admin')->group(function () {
        Route::get('/orderHistory', 'HomeController@orderHistory');

        Route::get('/employee', 'Admin\EmployeeController@index');
        Route::get('/employee/status/{id}', 'Admin\EmployeeController@status');

        Route::get('/staff', 'Admin\StaffController@index')->name('staff.index');
        Route::post('/staff', 'Admin\StaffController@store');
        Route::get('/staff/edit/{id}', 'Admin\StaffController@edit')->name('staff.edit');
        Route::put('/staff/update/{id}', 'Admin\StaffController@update')->name('staff.update');
        Route::delete('/staff/delete/{id}', 'Admin\StaffController@destroy')->name('staff.destroy');

    });
});

Route::get('/employee/register', 'Employee\ELoginController@showEmployeeRegistration');
Route::post('/employee/register', 'Employee\ELoginController@createEmployer');

Route::get('/employee/login', 'Employee\ELoginController@showEmployerLoginForm');
Route::post('/employee/login', 'Employee\ELoginController@employerLogin');
Route::post('/employee/logout', 'Employee\ELoginController@employerLogout');

Route::group(['middleware' => ['employee'], 'prefix'=>'employee'], function () {
    Route::get('/home', 'Employee\EmployeeController@index');
    Route::get('/profile', 'Employee\EmployeeController@profile');
    Route::post('/profile/password', 'Employee\EmployeeController@changePassword');
    Route::get('/todaysMenu', 'Employee\EmployeeController@todaysMenu');
    Route::post('/orderItem', 'Employee\EmployeeController@orderItem');
    Route::get('/orderHistory', 'Employee\EmployeeController@orderHistory');
});

//Employee password reset routes
Route::post('/employee/password/email','Employee\ForgotpasswordController@sendResetLinkEmail')->name('employee.password.email');
Route::get('/employee/password/reset','Employee\ForgotpasswordController@showLinkRequestForm')->name('employee.password.request');
Route::post('/employee/password/reset','Employee\ResetpasswordController@reset');
Route::get('/employee/password/reset/{token}','Employee\ResetpasswordController@showResetForm')->name('employee.password.reset');

//STAFF
Route::group(['middleware' => ['auth'],'prefix' => 'staff'], function () {
    Route::resource('/category', 'Staff\CategoryController');
    Route::resource('/food', 'Staff\FoodController');
    Route::get('/food/status/{id}', 'Staff\FoodController@status');

    Route::get('/todaysOrder','Staff\OrderController@index');
    Route::get('/todaysOrder/delivery/{id}','Staff\OrderController@deliverStatus');

});
