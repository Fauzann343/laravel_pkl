<?php

namespace App\Providers;
use View;
use Illuminate\Support\ServiceProvider;
use Auth;
use App\Models\Cart;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('#',function($view){
$cartItems = [];



if(Auth::check()){
$cartItems = Cart::with(product)->where('user_id',Auth::id())
->$get();

}
$view->with('cartItems',collect($cartItems));
        });
    }
}
