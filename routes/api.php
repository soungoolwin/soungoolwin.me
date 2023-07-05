<?php



use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

<<<<<<< HEAD
=======
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

>>>>>>> parent of 73f405a (update cors setting)
Route::get('blogs', [BlogController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);

Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
Route::get('/signup/verify', [AuthController::class, 'showverifytemplate']);

Route::group(['middleware' => 'web'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});
