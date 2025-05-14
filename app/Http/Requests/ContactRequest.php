<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ];

        if (getSettingsValue('is_recaptcha') == 1) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required'                 => 'Name is required.',
            'name.string'                   => 'Name must be a string.',
            'name.max'                      => 'Name must not be greater than 255 characters.',
            'email.required'                => 'Email is required.',
            'email.email'                   => 'Please enter a valid email.',
            'subject.required'              => 'Subject is required.',
            'subject.string'                => 'Subject must be a string.',
            'subject.max'                   => 'Subject must not be greater than 255 characters.',
            'message.required'              => 'Message is required.',
            'message.string'                => 'Message must be a string.',
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha'  => 'Captcha error! Please try again later or contact us.',
        ];
    }
}
