<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaceBookController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;

Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
// Facebook Login URL
Route::prefix('facebook')->name('facebook.')->group(function () {
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});
// Google Login URL
Route::prefix('google')->name('google.')->group(function () {
    Route::get('auth', [GoogleController::class, 'loginUsingGoogle'])->name('login');
    Route::get('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});
// Github Login URL
Route::prefix('github')->name('github.')->group(function () {
    Route::get('auth', [GithubController::class, 'loginUsingGithub'])->name('login');
    Route::get('callback', [GithubController::class, 'callbackFromGithub'])->name('callback');
});