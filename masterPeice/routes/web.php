<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Voyager;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/job', [App\Http\Controllers\HomeController::class, 'job']);
Route::get('/addjob', [App\Http\Controllers\HomeController::class, 'addjob']);
Route::get('/contact', function(){
    return view('contact');
});
Route::get('/about', function(){
    return view('about');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::any('/edituser/{id}', [App\Http\Controllers\HomeController::class, 'edituser']);