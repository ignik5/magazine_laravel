<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use  App\Services\currencyconversion;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
                View::composer(['layouts.master', 'categories'],'App\ViewComposers\CategoriesComposer');
                View::composer(['layouts.master'],'App\ViewComposers\CurrenciesComposer');
                View::composer(['layouts.master'],'App\ViewComposers\BestProductsComposer');

                View::composer('*',function($view){
                    $currencySimbol=currencyconversion::getCurrencySymbol();
                    $view->with('currencySimbol', $currencySimbol);
                });
    }
}
