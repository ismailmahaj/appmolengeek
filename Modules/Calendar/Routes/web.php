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

Route::prefix('calendar')->group(function() {
    Route::resource('admin/calendar', 'EventsController');
    Route::get('admin/calendar', 'EventsController@index')->name('events.index');
    Route::post('admin/calendar', 'EventsController@store')->name('events.store');
    Route::put('admin/calendar/{id}', 'EventsController@update')->name('events.update');

    Route::get('/calendar/admin/calendar/{event}', 'EventsController@show')->name('events.show');
Route::get('/alertBox', function(){
    return view('eventnotification');
});
Route::get('/firEvent', function(){
   event(new eventTrigger());
});
    // Route::post('admin/calendar', 'EventsController@index')->name('events.index');


});
