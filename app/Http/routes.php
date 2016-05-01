<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/', 'IndexController');
Route::resource('category', 'CategoryController');
Route::resource('survey', 'SurveyController');
Route::post('survey/respond', array('uses' => 'SurveyController@response'));

Route::group(['middleware' => 'web'], function(){
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::resource('/me', 'MemberController');
    Route::resource('responses', 'ResponseController');
    Route::resource('question', 'QuestionController');
    Route::get('question/{id}/create', 'QuestionController@create');
    Route::get('choice/{id}/create', 'ChoiceController@create');
    Route::resource('choice', 'ChoiceController');
    Route::resource('/admin/user', 'UserController');
    Route::resource('/admin/survey', 'AdminSurveyController');
    Route::resource('/admin/category', 'AdminCategoryController');
    Route::resource('/admin/role', 'RoleController');
});
