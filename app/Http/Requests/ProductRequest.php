<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
            'name'=>'required',
            'description'=>'required',
            'doctor_id'=>'required',
            'quantity'=>'required',
            'price'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.require'=>'name required',
            'description.required'=>'description required',
            'quantity.required'=>'Quantity required',
            'price.required'=>'Price required',
        ];
    }
}
