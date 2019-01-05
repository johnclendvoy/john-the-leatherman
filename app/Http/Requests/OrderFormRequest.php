<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'province' => 'required',
            'shipped_at' => 'required_with:send_shipped_email|date_format:Y-m-d|nullable',
        ];
    }

    public function messages()
    {
        return [
            'province.required' => 'The province / state field is required.',
            'postal_code.required' => 'The postal code / zip code field is required.'
        ];
    }
}
