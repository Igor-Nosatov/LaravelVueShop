<?php

use App\Http\Controllers\Api\Shop\AccountController;
use App\Http\Controllers\Api\Shop\AuthController;
use App\Http\Controllers\Api\Shop\CartController;
use App\Http\Controllers\Api\Shop\CheckoutController;
use App\Http\Controllers\Api\Shop\FavouriteController;
use App\Http\Controllers\Api\Shop\GiftCardController;
use App\Http\Controllers\Api\Shop\HomeController;
use App\Http\Controllers\Api\Shop\OptionController;
use App\Http\Controllers\Api\Shop\ReviewController;
use App\Http\Controllers\Api\Shop\ShoesController;
use App\Http\Controllers\Api\Shop\SignUpController;
use Illuminate\Support\Facades\Route;

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
Route::group([
    'prefix' => '/auth',
], function () {
    /** POST          api/auth/register      */
    Route::post('register', [AuthController::class, 'register']);
    /** POST          api/auth/login      */
    Route::post('login', [AuthController::class, 'login']);
});

/**  GET               */
Route::get('/home', [HomeController::class, 'index']);
/**  GET           api/shop      */
Route::get('/shop', [ShoesController::class, 'index']);
/** GET          api/options      */
Route::get('/options', [OptionController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    /** POST        api/gift-card      */
    Route::post('/gift-card', [GiftCardController::class, 'store']);

    /** POST         api/cart      */
    Route::post('/cart', [CartController::class, 'store']);
    /** GET         api/cart      */
    Route::get('/cart', [CartController::class, 'index']);
    /** GET         api/cart/account-data      */
    Route::get('/cart/account-data', [CartController::class, 'getAccountCartData']);
    /** POST        api/cart/{cart}/update      */
    Route::post('/cart/{cart}/update', [CartController::class, 'update']);
    /** POST        api/cart/{cart}/destroy      */
    Route::post('/cart/{cart}/destroy', [CartController::class, 'destroy']);

    /** GET          /me        */
    Route::get('/me', [AuthController::class, 'show']);
    /** GET          api/shop/{shoes}        */
    Route::get('/shop/{shoes}', [ShoesController::class, 'show']);

    /** POST         api/favourite        */
    Route::post('/favourite', [FavouriteController::class, 'store']);
    /** POST         api/favourite/{favourite}/destroy        */
    Route::post('/favourite/{favourite}/destroy', [FavouriteController::class, 'destroy']);
    /** GET       api/favourite        */
    Route::get('/favourite', [FavouriteController::class, 'getAccountFavouriteData']);

    Route::get('/review/{review}/show', [ReviewController::class, 'reviewShow']);
    /** GET        api/review/{shoes}      */
    Route::get('/review/{shoes}', [ReviewController::class, 'show']);
    /** POST        api/review/      */
    Route::post('review', [ReviewController::class, 'store']);
    /** POST        api/review/{review}/update      */
    Route::post('/review/{review}/update', [ReviewController::class, 'update']);
    /** POST        api/review/{review}/destroy      */
    Route::post('/review/{review}/destroy', [ReviewController::class, 'destroy']);

    /** POST        api/checkout      */
    Route::post('/checkout', [CheckoutController::class, 'store']);
    /** GET        api/checkout      */
    Route::get('/checkout', [CheckoutController::class, 'index']);
    /** POST        api/checkout/{checkout}/destroy      */
    Route::post('/checkout/{checkout}/destroy', [CheckoutController::class, 'destroy']);

    /** GET        api/account      */
    Route::get('/account', [AccountController::class, 'index']);
    /** POST        api/auth/logout      */
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    /** POST        api/auth/logout      */
    Route::post('/sign-up', [SignUpController::class, 'store']);
});
