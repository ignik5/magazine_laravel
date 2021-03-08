<?php
namespace App\ViewComposers;

use illuminate\View\View;
use  App\Services\currencyconversion;
Class CurrenciesComposer
{
        public function compose(View $view)
        {

           
             $currencies=currencyconversion::getCurrencies();
             $view->with('currencies',$currencies);
           }



}