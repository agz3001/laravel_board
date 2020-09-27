<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Thread;
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
Route::get('/', function () {
    return view('welcome');
});*/
Route::get("/", "ThreadController@index")->name("top");
Route::resource("threads", "ThreadController", ["only"=>["index", "store", "show"]]);
Route::resource("posts", "PostController", ["only"=>["store"]]);
