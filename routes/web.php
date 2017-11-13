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

Route::get('/' , 'HomeController@index');
Route::get('/article/{article}' , 'HomeController@article')->name('article.show');


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware'=>'auth'],function (){
    $this->get('/' , 'PanelController@index')->name('panel.index');
    $this->resource('articles' , 'ArticlesController');

    Route::group(['prefix' => 'exams'],function (){
        $this->get('/' , 'ExamsController@index');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
