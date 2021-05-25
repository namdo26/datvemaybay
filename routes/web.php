<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace'=>'Manage', 'middleware'=>['auth','role:super-admin|admin']],function(){

    Route::get('/admin', function (){
        return view('manage.layout.app');
    });

    Route::resource('users', 'userController');

});


Route::group(['namespace'=>'Client'],function(){

    Route::get('/', 'homeController@index')->name('home');
    
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'homeController@index')->name('home');

Route::post('update-image', 'RegisterController@update_image');