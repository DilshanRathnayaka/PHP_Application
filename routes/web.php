<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;




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

Route::get('table', function () {
    return view('table');
});
Route::get('dashboard', function () {
    return view('dashboard');
});
Route::get('update', function () {
    return view('update');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('insertData',[ProductController::class,'insert']);
Route::get('table',[ProductController::class,'readdata']);
Route::get('updatedelete',[ProductController::class,'updateordelete']);
Route::get('updatedata',[ProductController::class,'update']);


