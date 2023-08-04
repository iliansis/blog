<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [MainController::class,'welcome'])->name('welcome');

Route::post('/reg', [UserController::class, 'registration']);
Route::post('/auth', [UserController::class, 'authentication']);
Route::get('/logout', [UserController::class,'logout'])->name('logout');

Route::get('/profile', [MainController::class,'profile'])->middleware(['auth','verified'])->name('profile');
Route::get('/profile/addNews_Page', [MainController::class,'addNews_Page'])->middleware(['auth','verified'])->name('addNews_Page');
Route::post('/profile/addNews', [NewsController::class,'addNews'])->middleware(['auth','verified'])->name('addNews');
Route::get('/updateImg/{id}', [MainController::class,'updateImg'])->middleware(['auth','verified'])->name('updateImg');
Route::post('/changeImg', [NewsController::class,'changeImg'])->middleware(['auth','verified'])->name('changeImg');


Route::get('/profile/deleteNews/{id}', [NewsController::class,'deleteNews'])->middleware(['auth','verified'])->name('deleteNews');
Route::get('/profile/updateNewsPage/{id}', [MainController::class,'updateNewsPage'])->middleware(['auth','verified'])->name('updateNewsPage');
Route::post('/updateNews', [NewsController::class,'updateNews'])->middleware(['auth','verified'])->name('updateNews');

Route::get('/feedback', [MainController::class,'feedback'])->name('feedback');
Route::post('/feedback/send', [MailController::class,'feedbackSend'])->name('feedbackSend');


Route::get('/news/{id}', [MainController::class,'news'])->name('news');
Route::post('/addComment', [NewsController::class,'addComment'])->middleware(['auth','verified'])->name('addComment');

Route::get('/like/{id}', [NewsController::class,'like'])->middleware(['auth','verified'])->name('like');


Route::get('/email/verify', [MainController::class,'veryfication'])->middleware('auth')->name('verification.notice');
Route::post('/email/verify-send',[MailController::class,'verify_send'])->middleware('auth')->name('verification.send');
Route::get('/email/verify/{id}/{hash}',[MailController::class,'verify'])->middleware(['auth','signed'])
->name('verification.verify');

Route::post('/forgot_password', [UserController::class, 'forgot_password'])->name('password.email');
Route::get('password/reset', [MainController::class,'reset_password'])->name('password.reset');
Route::post('password/update', [UserController::class,'update_password'])->name('password.update');