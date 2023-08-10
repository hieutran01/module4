<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();


        View::composer('*', function ($view) {
            $cart = \Session::get('cart');
            $cart_total = 0;
        
            if (isset($cart) && is_array($cart)) {
                $cart_total = count($cart);
            }
        
            $ss_cart = [
                'cart' => $cart, 
                'cart_total' => $cart_total, 
            ];
        
            $view->with('ss_cart', $ss_cart);    
        });
        
    }
}
