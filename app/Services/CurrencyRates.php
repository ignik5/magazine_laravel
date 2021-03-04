<?php
namespace App\Services;
use App\Services\currencyconversion;
use GuzzleHttp\Client;
use Exception;
use App\Models\Currency;
Class CurrencyRates
{

    public static function getRates()
    {
     $baseCurrency = currencyconversion::getbaseCurrency();
    
     $url = config('currency_rates.api_url').'?base='.$baseCurrency->code;
     $client = new Client();
     $response = $client->request('GET',$url);
     if($response->getStatusCode() !==200){
         throw new \Exception('There is a problem with currency rate services');
     }
     $rates = json_decode($response->getBody()->getContents(),true)['rates'];
     foreach(currencyconversion::getCurrencies() as $currency){
     
         if(!$currency->isMain()){
             if(!isset($rates[$currency->code])){
                 
         throw new \Exception('There is a problem with currency '.$currency->code);

             }else{
                $currency->update(['rate'=>$rates[$currency->code]]);
                $currency->touch();
             }
         }
     }
    }
}