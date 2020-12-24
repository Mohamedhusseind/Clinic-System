<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'name' => 'required|max:100',
            'status' => 'required',
            'age' => 'required',
            'address' => 'required',
            'phone' => 'required|unique:patients,phone',
            'gender' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'name required',
            'phone.unique'=>'phone already exist',
            'status.required'=>'status required',
            'age.required'=>'age required',
            'gender.required'=>'gender required',
            'phone.required'=>'phone required',
            'address.required'=>'address required',
            ];
    }
}
