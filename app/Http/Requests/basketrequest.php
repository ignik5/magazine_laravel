<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class basketrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            
            'name'=>'required|min:3|max:255',
            'phone'=>'required|min:5|max:20',
            
                 
        ];
    }
    public function messages(){
        return [
            'required'=>'Поле :attribute обязательно для заполнения',
            'min'=>'Поле :attribute должно иметь минимум :min символов ',
           'max'=>'Поле :attribute должно иметь не более :max символов ',
            
        ];
    }
}
