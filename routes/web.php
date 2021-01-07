<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\DepartmentController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// Group section
Route::group(['middleware' => 'auth'], function () {
  Route::resource('usercategory', \App\Http\Controllers\UserCategoryController::class);
 Route::resource('groups', \App\Http\Controllers\GroupController::class);
 Route::get('alldata',[GroupController::class,'alldata']);
 Route::get('adddata',[GroupController::class,'adddata']);
  Route::get('editdata/{id}',[GroupController::class,'editdata']);
 Route::get('updatedata/{id}',[GroupController::class,'updatedata']);
  Route::get('deletedata/{id}',[GroupController::class,'deletedata']);
});
// Department section
Route::group(['middleware' => 'auth'], function () {
 Route::get('index',[DepartmentController::class,'index'])->name('department.index');
  Route::get('all-data',[DepartmentController::class,'allData']);
   Route::get('add_data',[DepartmentController::class,'addData']);
  Route::get('edit_data/{id}',[DepartmentController::class,'editData']);
 Route::get('update-data/{id}',[DepartmentController::class,'updateData']);
  Route::get('delete-data/{id}',[DepartmentController::class,'deleteData']);
});

// User Details section
Route::group(['middleware' => 'auth'], function () {
  Route::resource('userdetails', \App\Http\Controllers\UserDetailController::class);

});

