<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\MatricDashboardController;
use App\Http\Controllers\MatricCategoryController;

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
    return redirect('/login');
});

// Auth::routes();
Auth::routes(['register'=>false]);
Route::middleware(['auth'])->group(function () {
     // auth
     Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
     Route::get('/change-password', [\App\Http\Controllers\admin\ChangePasswordController::class, 'index'])->name('change.password');
     Route::post('/set-password', [\App\Http\Controllers\admin\ChangePasswordController::class, 'setPassword'])->name('set.password');
 
     //profile
    Route::get('/change-profile/{id}', [\App\Http\Controllers\admin\ProfileController::class, 'ProfileChange'])->name('change.profile');
    Route::put('/profile-update/{id}', [\App\Http\Controllers\admin\ProfileController::class, 'update'])->name('profile.update');

    //Matric admin panel

    Route::get('dashboard', [\App\Http\Controllers\MatricDashboardController::class, 'index'])->name('dashboard');

    Route::resource('/category', (\App\Http\Controllers\MatricCategoryController::class));
    Route::put('/category/{id}', [\App\Http\Controllers\MatricCategoryController::class, 'update']);

    
        //gallery
    Route::resource('/gallery', (\App\Http\Controllers\MatricGalleryController::class));
    Route::put('/gallery/{id}', [\App\Http\Controllers\MatricGalleryController::class, 'update']);
});


