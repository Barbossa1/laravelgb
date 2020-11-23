<?php

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

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])
    ->name('main');

//Admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])
        ->name('admin');
});

//Feedback
Route::group(['middleware' => 'auth'], function () {
    Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'index'])
        ->name('feedback');
    Route::post('/feedback/check', [App\Http\Controllers\FeedbackController::class, 'check'])
        ->name('check');
});

//News
Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{id}', [App\Http\Controllers\NewsController::class, 'show'])
    ->name('news.show');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/news_add', [App\Http\Controllers\NewsAddController::class, 'index'])
        ->name('news_add');
    Route::post('/news_add/add', [App\Http\Controllers\NewsAddController::class, 'addNews'])
        ->name('addNews');
});

Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])
    ->name('about');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

//Social
Route::group(['middleware' => 'guest'], function () {
    Route::get('login/vk', [\App\Http\Controllers\SocialController::class, 'redirectToProviderVK'])
        ->name('vk.login');
    Route::get('login/vk/callback', [\App\Http\Controllers\SocialController::class, 'handlerProviderCallbackVK'])
        ->name('vk.login.callback');
});
