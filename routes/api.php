<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Shop\HomeController;
use App\Http\Controllers\Api\Shop\ShoesController;
use App\Http\Controllers\Api\Shop\OptionController;
use App\Http\Controllers\Api\Shop\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/** POST               */
Route::get('/', [HomeController::class, 'index']);
/** POST          /shop       api.shop.index*/
Route::get('/shop', [ShoesController::class, 'index']);
/** POST          /options      */
Route::get('/options', [OptionController::class, 'index']);

Route::group([
    'prefix' => '/auth',
  ], function () {
    /** POST          /auth/register      */
    Route::post('register', [AuthController::class, 'register']);
    /** POST          /auth/login      */
    Route::post('login', [AuthController::class, 'login']);
  });


Route::middleware(['auth:sanctum'])->group(function () {
  /** GET          /me        */
  Route::get('/me', [AuthController::class, 'show']);

});

//middleware(['can:isManager'])

//Route::fallback(function () {

//});
