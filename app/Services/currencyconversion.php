<?
namespace App\Services;
use App\Models\Currency;

class currencyconversion
{
    protected static $container;
    public static function loadContainer()
    {
        if(is_null(self::$container)){
            $currencies =Currency::get();
            foreach($currencies as $currency){
            self::$container[$currency->code] = $currency;
        }
        
    }
    
    }
    public static function convert($sum, $origincorencycode = 'RUB', $targetcurrencycode = null){
        self::loadContainer();
       $origincorency = self::$container[$origincorencycode];
       if (is_null($targetcurrencycode)){
        $targetcurrencycode = session('currency', 'RUB');
       }
       $targetcurrency =  self::$container[ $targetcurrencycode];
       return $sum * $origincorency->rate / $targetcurrency->rate;
    }
    public static function getCurrencySymbol(){
        self::loadContainer();
        $currencyfromsession =   session('currency' , 'RUB');
      
        $currency = self::$container[$currencyfromsession];
           
        return $currency->Symbol;
            }

        public static function getCurrencies(){
    return self::$container;
        }
}