<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MainController;
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

Route::get('/', [BlogController::class, 'index'])->name('index');
Route::get('/category/{slug}', [BlogController::class, 'getPostsByCategory'])->name('getPostsByCategory');
Route::get('/category/{slug_category}/{slug_post}', [BlogController::class, 'getPost'])->name('getPost');
Route::get('/test-php', [BlogController::class, 'testPHP'])->name('testPHP');

Route::resource('/contact-us', \App\Http\Controllers\ContactController::class);


Route::post('/comments/check/{id}', [MainController::class, 'checkComments'])->name('checkComments');


Route::middleware(['role:admin'])->prefix('admin-dashboard')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard'); // .../admin/...
    Route::resource('category', CategoryController::class);
    Route::resource('post', PostController::class);
    Route::resource('user', UserController::class);
    Route::resource('contact', \App\Http\Controllers\Admin\ContactController::class);
    Route::get('/contact/{contact_id}/send-mail', [\App\Http\Controllers\Admin\ContactController::class, 'sendEmail'])->name('sendEmail');

});

Auth::routes();
