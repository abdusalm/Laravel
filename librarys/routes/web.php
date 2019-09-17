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

use App\Http\Controllers\MainController;

Route::get('/','MainController@index');
Route::get('home','MainController@back');
Route::get('exit','MainController@exit');


Route::get('course','SearchController@courses');
Route::get('major','SearchController@majors');
Route::get('searchAll','SearchController@searchAll');

Route::get('owns','SearchController@owns');

Route::get('article','SearchController@getOne')->middleware('checkLogin');

Route::post('loginDo','MainController@loginDo');

Route::post('publishDo','PublishController@publishDo')->middleware('checkLogin');

Route::get('publish','PublishController@publish')->middleware('checkLogin');

Route::get('register','MainController@register');
Route::post('registerDo','MainController@registerDo');

Route::get('update',function (){
    return view('userinfo')->middleware('checkLogin');
});
Route::post('updateDo','MainController@update')->middleware('checkLogin');

Route::get('login',function (){
    return view('LoginPage');
});

Route::get('collect','CollectionController@collect')->middleware('checkLogin');

Route::get('collectionShell','CollectionController@collections')->middleware('checkLogin');

Route::get('edit','PublishController@edit')->middleware('checkLogin');

Route::post('editDo','PublishController@editDo')->middleware('checkLogin');

Route::get('deleteDo','PublishController@deleteDo')->middleware('checkLogin');





