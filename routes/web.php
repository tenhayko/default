<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// end

Route::prefix('admin')->group(function(){
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

    //Password reset routes
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
		
    //Admin
    Route::prefix('admin')->group(function(){
    	Route::get('/list','Admin\AdminController@getList');
    	Route::post('/add','Admin\AdminController@postAdd');
    	Route::get('/edit/{id}','Admin\AdminController@getEdit');
        Route::get('/info/{id}','Admin\AdminController@getInfo');
    	Route::post('/edit/{id}','Admin\AdminController@postEdit');
        Route::post('/delete/{id}','Admin\AdminController@postDelete');
        Route::post('/upload','Admin\AdminController@upload');
        Route::get('/profile','Admin\AdminController@getProfile');
        Route::get('/history/{id}','Admin\AdminHistorysController@list');
    });


});


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

// //Clear Config cache:
Route::get('/config-cache', function() {
    // phpinfo();
    // echo date('y-m-d H:i:s', 1516155660);die;
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
