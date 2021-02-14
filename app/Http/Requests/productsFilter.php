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
            'price_from'=>'nullable|numeric|min:0',
            'price_to'=>'nullable|numeric|min:0',
        ];
    }
}
