<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'patient_id' => 'required',
            'receptionist_id' => 'required',
            'phone' => 'required',
            'price' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'name required',
            'status.required' => 'status required',
            'patient_id.required' => 'patient_id required',
            'phone.required' => 'phone required',
            'price.required' => 'price required'
        ];
    }
}
