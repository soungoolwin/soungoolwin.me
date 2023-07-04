<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
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

Route::get('/{vue_capture?}', function () {
    return view('main');
})->where('vue_capture', '[\/\w\.-]*');
Route::get('/blogs/{blog:slug}', [MainController::class, 'show']);
Route::get('/login', [AuthController::class, 'showlogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/signup', [AuthController::class, 'showsignup']);
Route::get('/signup/verify', [AuthController::class, 'showverifytemplate']);
Route::post('/signup', [AuthController::class, 'signup']);




Route::middleware(['is_admin'])->group(function () {
    Route::get('/dashboard/blogs/create', [DashboardController::class, 'createblog']);
    Route::post('/dashboard/blogs/create', [DashboardController::class, 'storeblog']);
    Route::get('/dashboard/blogs', [DashboardController::class, 'showblogstable']);
    Route::delete('/dashboard/blogs/{blog}', [DashboardController::class, 'destroy']);
    Route::get('/dashboard/blogs/{blog}/edit', [DashboardController::class, 'editblog']);
    Route::patch('/dashboard/blogs/{blog}/edit', [DashboardController::class, 'updateblog']);
});

Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
