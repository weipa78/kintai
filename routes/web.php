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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('top.index');

// トップページ
Route::get('/menu', 'App\Http\Controllers\MenuController@index');

// 社員登録
Route::get('/emp_registry_form', 'App\Http\Controllers\EmployeeController@form');
Route::post('/emp_registry', 'App\Http\Controllers\EmployeeController@create');

// 出退勤登録
Route::get('/time_registry', 'App\Http\Controllers\TimeRegistryController@form');
Route::post('/time_registry_create', 'App\Http\Controllers\TimeRegistryController@create');

// 出退勤管理/照会
// 一覧メニュー表示
Route::get('/time_manage', 'App\Http\Controllers\TimeManageController@index');

// 更新入力フォーム表示
Route::post('/timeUpdateInput', 'App\Http\Controllers\TimeManageController@input');
// 更新確認画面表示
Route::post('/timeUpdateConfirm', 'App\Http\Controllers\TimeManageController@updateConfirm');
// 更新
Route::post('/timeUpdate', 'App\Http\Controllers\TimeManageController@update');

// 削除確認画面表示
Route::post('/timeDeleteConfirm', 'App\Http\Controllers\TimeManageController@deleteConfirm');
// 削除
Route::post('/timeDelete', 'App\Http\Controllers\TimeManageController@delete');

// 勤怠申請
// Route::get('', 'App\Http\Controllers\TimeApplyController@add');


// 集計/出力
// Route::get('', 'App\Http\Controllers\AggregateOutputController@add');

