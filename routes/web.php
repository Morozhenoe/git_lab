<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'checkProfileAccess','namespace' => 'App\Http\Controllers\Profile'], function () {
    Route::get('/profile/{user}', 'IndexController')->name('profile.index');
    Route::patch('/profile/{user}/update-profile', 'UpdateController')->name('profile.update');
    Route::patch('/profile/{user}/update-password', 'UpdatePasswordController')->name('profile.update.password');
});


Route::group(['namespace' => 'App\Http\Controllers\Holiday'], function () {
    Route::get('/home/create-holiday', 'CreateController')->name('holidays.create');
    Route::post('/home/store-holiday', 'StoreController')->name('holidays.store');
});

Route::group(['middleware' => 'checkModeratorAccess','namespace' => 'App\Http\Controllers\Moderator'], function () {
    Route::get('/moderator/users', 'IndexController')->name('moderator.index');
    Route::get('/moderator/users/{user}/edit-holiday', 'EditController')->name('moderator.holiday.edit');
    Route::patch('/moderator/users/{user}/update-holiday', 'UpdateController')->name('moderator.holiday.update');
});

Route::group(['middleware' => 'checkAdminAccess','namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::get('/admin/users', 'IndexController')->name('admin.index');
    Route::get('/admin/users/{user}/edit', 'EditController')->name('admin.edit');
    Route::patch('/admin/users/{user}/update', 'UpdateController')->name('admin.update');
    Route::patch('/admin/users/{user}/update-password', 'UpdatePasswordController')->name('admin.update.password');
    Route::delete('/admin/users/{user}/delete', 'DeleteController')->name('admin.destroy');
    Route::get('/admin/users/create', 'CreateController')->name('admin.create');
    Route::post('/admin/users/store', 'StoreController')->name('admin.store');
});

Route::fallback(function () {
   return back();
});
