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

/*
 * First page user will see
 */
Route::resource('/', 'IndexController');
/*
 * Route for showing all surveys linked to categories
 */
Route::resource('category', 'CategoryController');
/*
 * Route for displaying the survey view
 */
Route::resource('survey', 'SurveyController');
/*
 * Route designed to store the response corresponding to each survey via the response method.
 */
Route::post('survey/respond', array('uses' => 'SurveyController@response'));

/*
 * All routes in this group require the user to be logged in
 */
Route::group(['middleware' => 'web'], function(){
    Route::auth();
    /*
     * Default controller for auth
     */
    Route::get('/home', 'HomeController@index');
    /*
     * Users personal page.
     */
    Route::resource('me', 'MemberController');
    /*
     * View to show responses for each survey
     */
    Route::resource('responses', 'ResponseController');
    /*
     * Route to modify each question in a survey
     */
    Route::resource('question', 'QuestionController');
    /*
     * Route to create a question for a survey, then redirecting to the id of the question
     */
    Route::get('question/{id}/create', 'QuestionController@create');
    /*
     * Route ro create a choice for a question, then redirecting back to the choice
     */
    Route::get('choice/{id}/create', 'ChoiceController@create');
    /*
     * Route to show all choices belonging to the question
     */
    Route::resource('choice', 'ChoiceController');
    /*
     * Admin view to see all users
     */
    Route::resource('/admin/user', 'UserController');
    /*
     * Admin view to see all surveys
     */
    Route::resource('/admin/survey', 'AdminSurveyController');
    /*
     * Admin view to see all categories
     */
    Route::resource('/admin/category', 'AdminCategoryController');
    /*
     * Admin view to see all roles
     */
    Route::resource('/admin/role', 'RoleController');
});
