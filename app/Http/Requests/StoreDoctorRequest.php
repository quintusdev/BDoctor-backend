<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'address' => 'required | max:80',
            'phone' => 'required | max:13',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => __('L\'indirizzo è obbligatorio'),
            'address.max' => __('L\'indirizzo può essere lungo al massimo :max caratteri.'),

            'phone.required' => __('Il numero di telefono è obbligatorio'),
            'phone.max' => __('Il numero di telefono può essere lungo al massimo :max cifre.')
        ];
    }
}
