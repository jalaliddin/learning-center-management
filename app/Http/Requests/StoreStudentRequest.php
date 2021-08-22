<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'firstname' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'sms_phone' => 'required',
            'description' => 'required',
            'avatar' => 'required|mimes:jpg,bmp,png'
        ];
    }
}
