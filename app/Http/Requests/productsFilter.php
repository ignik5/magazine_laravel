<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productsFilter extends FormRequest
{
   
 
   
   public function authorize()
   {
       return true;
   }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'price_from'=>'numeric|min:0',
            'price_to'=>'numeric|min:0',
        ];
    }
}
