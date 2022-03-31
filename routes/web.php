<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\singleaction;
use App\Http\Controllers\singleAction__invoke;
use App\Http\Controllers\UserController;
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

Route::get('/',[DemoController::class,'index']);
Route::get('/about',[DemoController::class,'about']);
Route::get('contact',singleaction::class);

Route::resource('/user',UserController::class);


/* Route::get('/', function () {
    return view('welcome');
});

Route::get('/new/{name}/{id?}', function ($name, $id=NULL) {

    $data = compact("name","id");
     return view("new")->with($data);
 })->whereNumber('id')->whereAlphaNumeric('name');

Route::get('/new', function () {

   // echo "<h1>Hello Harsh!!</h1>";
    return view('new');
}); */
