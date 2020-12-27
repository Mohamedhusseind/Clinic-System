<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'phone'=>'required',
            'email'=>'required|unique:doctors,email',
            'password'=>'required',
            'address'=>'required',

        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'name required',
            'phone.required'=>'phone required',
            'email.required'=>'email required',
            'password.required'=>'password required',
            'address.required'=>'address required',
        ];
    }
}
