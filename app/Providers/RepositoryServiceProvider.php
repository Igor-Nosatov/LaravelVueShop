<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Shop\Home\HomeRepositoryInterface;
use App\Repositories\Shop\Home\HomeRepository;
use App\Repositories\Shop\GiftCard\GiftCardRepository;
use App\Repositories\Shop\GiftCard\GiftCardRepositoryInterface;
use App\Repositories\Shop\Cart\CartRepository;
use App\Repositories\Shop\Cart\CartRepositoryInterface;
use App\Repositories\Shop\Product\ProductRepository;
use App\Repositories\Shop\Product\ProductRepositoryInterface;
use App\Repositories\Shop\Review\ReviewRepository;
use App\Repositories\Shop\Review\ReviewRepositoryInterface;
use App\Repositories\Shop\Shoes\ShoesRepository;
use App\Repositories\Shop\Shoes\ShoesRepositoryInterface;
use App\Repositories\Shop\Checkout\CheckoutRepository;
use App\Repositories\Shop\Checkout\CheckoutRepositoryInterface;
use App\Repositories\Shop\Option\OptionRepository;
use App\Repositories\Shop\Option\OptionRepositoryInterface;
use App\Repositories\Shop\Auth\AuthRepositoryInterface;
use App\Repositories\Shop\Auth\AuthRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
            $this->app->bind(HomeRepositoryInterface::class, HomeRepository::class);
            $this->app->bind(GiftCardRepositoryInterface::class, GiftCardRepository::class);
            $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
            $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
            $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
            $this->app->bind(ShoesRepositoryInterface::class, ShoesRepository::class);
            $this->app->bind(CheckoutRepositoryInterface::class, CheckoutRepository::class);
            $this->app->bind(OptionRepositoryInterface::class, OptionRepository::class);
            $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
