<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
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
            'name' => 'required|max:50',
            'surname' => 'required|max:50',
            'specializations' => 'required|array|min:1',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Il nome è obbligatorio',
            'surname.required' => 'Il cognome è obbligatorio',
            'specializations.required' => 'Seleziona almeno una specializzazione'
        ];
    }
}
