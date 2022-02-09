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

/* 股票代號 */
Route::resource('Stock', 'App\Http\Controllers\StockController');

/* 股票開高低收 */
Route::resource('StockPrice', 'App\Http\Controllers\StockPriceController');

/* 實驗基本資料 */
Route::resource('Experiment', 'App\Http\Controllers\ExperimentController');

Route::post('ExperimentalreadyExists', 'App\Http\Controllers\ExperimentController@alreadyExists');

/* 基因演算法參數 */
Route::resource('GAParams', 'App\Http\Controllers\GAParamsController');

/* 實驗結果 */
Route::resource('ExperimentResult', 'App\Http\Controllers\ExperimentResultController');

/* 實驗移動視窗 */
Route::resource('ExperimentWindow', 'App\Http\Controllers\ExperimentWindowController');

/* 讀取實驗指標 */
Route::post('getResultReturn', 'App\Http\Controllers\ExperimentController@getResultReturn');
Route::post('getResultSTDReturn', 'App\Http\Controllers\ExperimentController@getResultSTDReturn');

Route::get('/', function () {
    return view('welcome');
});
