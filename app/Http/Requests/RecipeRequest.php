<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
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
            'status'=>'required',
            'product'=>'required',
            'patient_id'=>'required',
            'diagnosis'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'status.required'=>'status required',
            'product.required'=>'status required',
            'patient_id.required'=>'ID required',
            'diagnosis.required'=>'Diagnosis required',
        ];
    }
}
