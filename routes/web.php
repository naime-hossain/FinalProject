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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::group(['middleware' => 'auth'],function(){
Route::get('/AdminPanel', 'AdminPanelController@index')->name('AdminPanel');
Route::get('/MoviePosters', 'MoviePostersController@index')->name('MoviePosters');
Route::get('/CustomizeWeb', 'CustomizeWebController@index')->name('CustomizeWeb');
});

Route::get('/index', 'indexController@index')->name('index');

Route::post('loginprocess',[
'uses'=> 'AdminPanelController@loginprocess',
'as' => 'loginprocess'
]);
Route::get('/logout', 'AdminPanelController@logout')->name('logout');

// AdminPanel
Route::post('adinsert',[
'uses'=> 'AdminPanelController@adinsert',
'as' => 'adinsert'
]);
Route::get('/edit/{id}', 'AdminPanelController@edit');
Route::put('/adminedit/{id}', 'AdminPanelController@adminedit');
Route::get('delete{id}','AdminPanelController@DeleteUser');

// MoviePosters
Route::post('posterinsert',[
'uses'=> 'MoviePostersController@posterinsert',
'as' => 'posterinsert'
]);
Route::get('/postershowedit/{id}', 'MoviePostersController@postershowedit');
Route::put('/posteredit/{id}', 'MoviePostersController@posteredit');
Route::get('posterdelete{id}','MoviePostersController@DeletePoster');

// CustomizeWeb
Route::post('logoupdate',[
'uses'=> 'CustomizeWebController@logoupdate',
'as' => 'logoupdate'
]);
Route::get('/Logo', 'CustomizeWebController@logoshow')->name('Logo');