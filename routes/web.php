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
        $this->get('/' , 'ExamsController@index')->name('exams.index');
        $this->get('/create' , 'ExamsController@create')->name('exams.create');
        $this->post('/create' , 'ExamsController@store')->name('exams.store');
        $this->get('/edit' , 'ExamsController@edit')->name('exams.edit');
        $this->post('/edit' , 'ExamsController@update')->name('exams.update');
        $this->post('/{examId}' , 'ExamsController@destroy')->name('exams.destroy');

        Route::group(['prefix' => 'questions'],function (){
            $this->get('/' , function (){
                return redirect('exams');
            });
            $this->get('/{examId}' , 'QuestionsController@index')->name('questions.index');
            $this->get('/{examId}/create' , 'QuestionsController@create');
            $this->post('/{examId}/create' , 'QuestionsController@store');
            $this->post('/delete/{questionId}','QuestionsController@destroy');
            $this->get('/{examId}/edit/{questionId}','QuestionsController@edit');
            $this->post('/{examId}/update','QuestionsController@update');
        });
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
