<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('admin/home', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('admin.home');
Route::middleware('auth')->name('admin.')->prefix('admin/')->group(function(){
        Route::resource("projects", AdminProjectController::class);
        Route::get('types',[AdminTypeController::class, 'index'])->name('types.index');
    }
);



