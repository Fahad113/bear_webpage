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

//Route::get('/',function(){
//    return "<h1>Base Route</h>"; 
//});
//


Route::group(['middleware' => 'web'], function () {
   
   Route::get('/', 'HomeController@index');

    Route::auth();
    //Routes To Display Record In View Page
    Route::get('/bear','bearController@getbear');
    Route::get('/picnic','bearController@getpicnic');
    Route::get('/fish','bearController@getfish');
    Route::get('/tree','bearController@gettree');
    
    //Routes to Add Record
    Route::post('/submit','bearController@add_bear');
    Route::post('/submit_fish','bearController@add_fish');
    Route::post('/submit_trees','bearController@add_tree');
    Route::post('/submit_picnic','bearController@add_picnic');
    //Delete Record Routes
    Route::get('/delete/{id}','bearController@bear_delete');
    Route::get('/fish-Delete/{id}','bearController@fish_delete');
    Route::get('/tree-Delete/{id}','bearController@tree_delete');
    Route::get('/picnic-Delete/{id}','bearController@picnic_delete');
    
});
;