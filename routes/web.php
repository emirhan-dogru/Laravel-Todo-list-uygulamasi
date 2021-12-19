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

Route::group(['namespace' => 'App\Http\Controllers\Backend'], function () {

    Route::get('/yonetim-girisi', 'AdminController@login')->name('admin.Login')->middleware('isLogin');
    Route::post('/yonetim-girisi', 'AdminController@auth')->name('admin.Auth')->middleware('isLogin');


    Route::middleware(['AuthControl'])->group(function () {
        Route::get('/admin/dashboard', 'AdminController@index')->name('admin.Index');
        Route::get('/admin/dashboard/todo-list/{id}', 'AdminController@todoList')->name('admin.todoList');
    });


});

Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function () {
    Route::get('/uye-girisi', 'HomeController@login')->name('user.Login')->middleware('isLogin');
    Route::post('/uye-girisi', 'HomeController@auth')->name('user.Auth')->middleware('isLogin');



    Route::get('/kaydol', 'HomeController@Register')->name('user.Register')->middleware('isLogin');
    Route::post('/kaydol', 'HomeController@UserCreate')->name('user.Create')->middleware('isLogin');

    Route::middleware(['AuthControl'])->group(function () {
        Route::get('/', 'HomeController@index')->name('home.Index');
        Route::post('/', 'HomeController@index')->name('home.Index');
        Route::get('todo/yeni-ekle', 'HomeController@add')->name('home.Add');
        Route::post('todo/yeni-ekle', 'HomeController@create')->name('home.Create');
        Route::get('todo/duzenle/{id}', 'HomeController@edit')->name('home.Edit');
        Route::post('todo/duzenle/{id}', 'HomeController@update')->name('home.Update');
        Route::get('todo/deactive/{id}', 'HomeController@deactive')->name('home.Deactive');
        Route::get('todo/deactives', 'HomeController@deactives')->name('home.Deactives');
        Route::get('todo/active/{id}', 'HomeController@active')->name('home.Active');
        Route::get('todo/delete/{id}', 'HomeController@delete')->name('home.Delete');
        Route::get('todo/cikis', 'HomeController@logout')->name('home.Logout');
    });


});
