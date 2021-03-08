<?
namespace App\Services;
use App\Models\Currency;
use Carbon\Carbon;
class currencyconversion
{
    protected static $container;
    public const DEFAULT_CURRENCY_CODE = 'RUB';

    public static function loadContainer()
    {
        if(is_null(self::$container)){
            $currencies = Currency::get();
            foreach($currencies as $currency){
            self::$container[$currency->code] = $currency;
        }
        
    }
    
    }
    public static function convert($sum, $originCurrencycode = 'RUB', $targetcurrencycode = null){
        self::loadContainer();
          $originCurrency = self::$container[$originCurrencycode];
         if($originCurrency->code != self::DEFAULT_CURRENCY_CODE){
           if($originCurrency->rate != 0 || $originCurrency->updated_at->startOfDay() != Carbon::now()->startOfDay()->toString()){
           CurrencyRates::getRates();
           self::loadContainer();
           $originCurrency = self::$container[$originCurrencycode];

       }
    }
       if (is_null($targetcurrencycode)){
        $targetcurrencycode = session('currency', 'RUB');
       }
       $targetcurrency = self::$container[$targetcurrencycode];
       if($originCurrency->code != self::DEFAULT_CURRENCY_CODE){
       if($targetcurrency->rate !=0 || $targetcurrency->updated_at->startOfDay() != Carbon::now()->startOfDay()){
        CurrencyRates::getRates();
           self::loadContainer();
           $targetcurrency = self::$container[$targetcurrencycode];
    }
}
      
       return $sum / $originCurrency->rate * $targetcurrency->rate;
    }
    public static function getCurrencySymbol()
        {
        self::loadContainer();
        $currencyfromsession =   session('currency' , 'RUB');
      
        $currency = self::$container[$currencyfromsession];
           
        return $currency->Symbol;
        }

        public static function getCurrencies()
        {
            self::loadContainer();
            return self::$container;
        }
        public static function getbaseCurrency()
        {
            self::loadContainer();
            foreach(self::$container as $code=>$currency){
                if ($currency->isMain()){
                    return $currency;
                }

            }
        }
}