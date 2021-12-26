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
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/logout', 'LoginController@logout');

// ーーーーーーートップページーーーーーーーーーーーーーーーー

// 参画案件表示
Route::get('/index', 'PostsController@index');

// 案件募集機能
Route::post('post/create', 'PostsController@create');



// ーーーーーーーー応募状況ページーーーーーーーーーーーーーー



// 案件一覧表示
Route::get('/projectlist', 'PostsController@projectlist');

// 参画機能
Route::post('/join','JoinController@join');

// 案件検索機能
Route::get('/result', 'PostsController@result');
Route::post('/result', 'PostsController@result');

Route::get("/projectstatus/{id}",'PostsController@projectstatus');


// ーーーーーーープロフィールページーーーーーーーーーーーーー



// ログインユーザープロフィール表示
Route::get('/profile', 'UserController@profile');
Route::get('/update/profile', 'UserController@update_profile');
Route::post('/update/profile', 'UserController@update_profile');
Route::get('/userprofile/{id}', 'UserController@userprofile');


// ーーーーーーーユーザー検索ページーーーーーーーーーーーーー



// ユーザー一覧表示
Route::get('/userlist', 'UserController@userlist');
Route::get('/userresult', 'UserController@usersresult');
Route::post('/userresult', 'UserController@usersresult');


