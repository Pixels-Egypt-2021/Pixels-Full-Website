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



/*
 * --------------------------------------------------------------------------
Recrut Form Routes
--------------------------------------------------------------------------
*/

Route::get('/attack-on-pixels','FormController@index');
Route::post('/post-data','FormController@post')->name('attack');
Route::get('/pixels-attack-data','FormController@getAllData');


/*
 * --------------------------------------------------------------------------
Admin Routes
--------------------------------------------------------------------------
*/




/*--------------------------------------------------------------------------
    2. Admin panel Routes
----------------------------------------------------------------------------*/
/*-------------------> participants <---------------------*/




/*-------------------> Projects <---------------------*/




/*-------------------> Events <---------------------*/




/*-------------------> Articels <---------------------*/

Route::resource('articles', 'AdminArticleController');


Route::resource('admin-magazine', 'AdminMagazineController');


Route::resource('sponsors', 'AdminSponsorController');


Route::resource('events', 'AdminEventController');


Route::resource('projects', 'AdminProjectController');



// List subscribers
Route::get('subscription', 'subscriptionController@index');

// send mail
Route::get('send', 'subscriptionController@send_email');

// Add new subscriber
Route::post('subscription', 'subscriptionController@store');

// Delete subscriber
Route::delete('subscription/{id}', 'subscriptionController@destroy');



/*--------------------------------------------------------------------------
    1. General Routes For React view
---------------------------------------------------------------------------*/
Route::view('/{path?}', 'app');

Route::view('project/{path?}', 'app');
Route::view('blog/{path?}', 'app');

// Route::view('admin/{path?}', 'admin');
/*--------------------------------------------------------------------------
    End General Routes For React view
---------------------------------------------------------------------------*/
