<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
        $rules=[ 
            
            'code'=>'required|min:3|max:255|unique:products,code',
            'name'=>'required|min:3|max:255',
            'description'=>'required|min:5',
            'price'=>'required|numeric|min:1',
            'price'=>'required|numeric|min:0',
            
                 
        ];
        
        if($this->route()->named('products.update')){
            $rules['code'] .=',' .$this->route()->parameter('product')->id;
        }
        return $rules;
        
       
    }
   
public function messages(){
    return [
        'required'=>'Поле :attribute обязательно для заполнения',
        'min'=>'Поле :attribute должно иметь минимум :min символов ',
       'max'=>'Поле :attribute должно иметь не более :max символов ',
       'integer'=>'Поле :attribute должно быть числовым ',
       'unique'=>"Такой продукт уже есть"
    ];
}
}