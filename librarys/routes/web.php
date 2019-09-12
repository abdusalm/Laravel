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

//Route::get('/', function () {
//    return view('home');
//});


use App\Http\Controllers\MainController;

Route::get('/','MainController@index');
Route::get('home','MainController@back');
Route::get('exit','MainController@exit');


Route::get('course','SearchController@courses');
Route::get('major','SearchController@majors');
Route::get('searchAll','SearchController@searchAll');

Route::get('owns','SearchController@owns');

Route::get('article','SearchController@getOne');

Route::post('loginDo','MainController@loginDo');

Route::post('publishDo','PublishController@publishDo');

Route::get('publish','PublishController@publish');

Route::get('register','MainController@register');
Route::post('registerDo','MainController@registerDo');

Route::get('update',function (){
    return view('userinfo');
});
Route::post('update','MainController@updateDo');

Route::get('login',function (){
    return view('LoginPage');
});



