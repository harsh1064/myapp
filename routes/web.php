<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\singleaction;
use App\Http\Controllers\singleAction__invoke;
use App\Http\Controllers\UserController;
use App\Models\UserModel;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

//Route::get('/',[DemoController::class,'index']);
//Route::get('/about',[DemoController::class,'about']);
//Route::get('contact',singleaction::class);
//Route::get('/user/delete/{id}', 'UserController@destroy')->name('user_del');

Route::get('/user/get_session',function(Request $request){

    $session = $request->session()->all();
    print_r($session);
    echo session('name');
});

Route::get('/user/view_session',function(Request $request){

    
    echo session('name');
});


Route::get('/user/set_session',function(Request $request){

    $request->session()->put(['name'=>'Bhavik','sname'=>'Prajapati']);
    
});



Route::get('/',[UserController::class,'index']);
Route::get('/login',[UserController::class,'login']);
Route::post('/home',[UserController::class,'home']);
Route::get('/add',[UserController::class,'create'])->name('user.add');
Route::post('/user',[UserController::class,'store'])->name('user.submit');
Route::get('/delete/{id}',[UserController::class,'destroy'])->name('user.del');
Route::get('/edit/{id}',[UserController::class,'edit'])->name('user.edt');
Route::post('/update/{id}',[UserController::class,'update'])->name('user.update');

//Route::resource('/user',UserController::class)->except('show');

// Route::get('/user',function(){

//     $user = UserModel::all();
//     print_r($user->toArray());
// });


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
