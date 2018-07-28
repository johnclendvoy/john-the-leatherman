<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'email' => 'required|email',
            'comments' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You must enter your name.',
            'email.required' => 'You must enter your email address.',
            'comments.required' => 'You must enter some sort of message.',
            'g-recaptcha-response.*' => 'Please prove you are not a robot by filling out the reCAPTCHA.'
        ];
    }
}
