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

Route::resource( 'calendar', 'CalendarController' );
Route::resource( 'task', 'TaskController' );

// Route::get('/', function () {
//     return view('home.index');
// })->name( 'home' );

Route::get( '/', 'HomeController@index' )->name( 'home' );

Route::get( '/calendar/displayWeek/{first_day}/{increment}/{year}', 'CalendarController@displayWeek' )->name( 'displayWeek' );

Route::get( '/calendar/{calendar}/{year}', 'CalendarController@changeMonth' )->name( 'changeMonth' );

Route::post( '/delete-task', 'TaskController@deleteTask' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
