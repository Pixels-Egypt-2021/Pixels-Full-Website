<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// List Articles
Route::get('articles', 'ArticleController@index');

// List Single Article
Route::post('article-by-id', 'ArticleController@show');

// Update article
Route::put('article', 'ArticleController@store');

// Create new article
Route::post('article', 'ArticleController@store');

// Delete article
Route::delete('article/{id}', 'ArticleController@destroy');



// List magazine articles
Route::get('magazine', 'MagazineController@index');

// List Single Article
Route::get('magazine/{id}', 'MagazineController@show');

// Update article
Route::put('magazine', 'MagazineController@store');

// Create new article
Route::post('magazine', 'MagazineController@store');

// Delete article
Route::delete('magazine/{id}', 'MagazineController@destroy');




// List Sponsors
Route::get('sponsors', 'SponsorController@index');

// List Single Sponsor
Route::get('sponsor/{id}', 'SponsorController@show');

// Update Sponsor
Route::put('sponsor', 'SponsorController@store');

// Add new sponsor
Route::post('sponsor', 'SponsorController@store');

// Delete sponsor
Route::delete('sponsor/{id}', 'SponsorController@destroy');




// List events
Route::get('get-events', 'EventHandelController@index');

// List Single event
Route::get('event/{id}', 'EventController@show');

// Update event
Route::put('event', 'EventController@store');

// Add new event
Route::post('event', 'EventController@store');

// Delete event
Route::delete('event/{id}', 'EventController@destroy');



// List events
Route::get('projects', 'ProjectController@index');

// List Single event
Route::get('project/{id}', 'ProjectController@show');

// Update event
Route::put('project', 'ProjectController@store');

// Add new event
Route::post('project', 'ProjectController@store');

// Delete event
Route::delete('project/{id}', 'ProjectController@destroy');






// List subscribers
Route::get('subscription', 'subscriptionController@index');


// send mail
Route::get('send', 'subscriptionController@send_email');


// Add new subscriber
Route::post('subscription', 'subscriptionController@store');

// Delete subscriber
Route::delete('subscription/{id}', 'subscriptionController@destroy');

Route::get('send', 'subscriptionController@send_email');

Route::post('participant', 'subscriptionController@store');

Route::get('course/{id?}', 'allCoursesController@getById');


// Registration Form Mini Event
Route::get('get-courses', 'allCoursesController@index');

// Get all paticipant
Route::get('get-participants', 'MiniEventFormController@index');

// store paticipant from the form
Route::post('post-participants', 'MiniEventFormController@postpartispant');


Route::post('post-internal-participat', 'MiniEventFormController@postInternalPartispant');



/*
    --------------------------------------------------------------------------
    admin api routs
    -------------------------------------------------------------------------
*/

// sent main project details
Route::post('project-details', 'ProjectAdminController@store');

// Get all project main details
Route::get('get-project-details', 'ProjectAdminController@getProjects');

// Get project main details by id
Route::post('get-project-details-id', 'ProjectAdminController@getProjectDetailsById');

// Get project content by id
Route::get('get-project-details', 'ProjectAdminController@getProjects');

// sent all details of project
Route::post('projects-content', 'ProjectAdminController@storeContent');

// get the projects content
Route::get('get-projects-content', 'ProjectAdminController@getProjectsContent');







