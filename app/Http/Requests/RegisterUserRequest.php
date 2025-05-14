<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'full_name'            => 'required',
            'email'                => 'required|email',
        ];

        if ($this->routeIs('*enrol*')) {
            $rules['number'] = 'required|min:10|numeric|regex:/[0-9]{10}/';
            $rules['address'] = 'required';
        }

        if ($this->routeIs('user-register')) {
            $rules['password'] = 'required|min:8';
        }

        if ($this->has('create-account-check')) {
            $rules['password'] = 'required|min:8';
            $rules['username'] = 'required|unique:users';
        }

        if(getSettingsValue('is_recaptcha') == 1) {
//            $rules['g-recaptcha-response'] = 'required|captcha';
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
            'full_name.required'            => 'Full name is required as it will be displayed in your certificate.',
            'email.required'                => 'Email is required for contact, verification and login.',
            'email.email'                   => 'Email must be a valid email address.',
            'email.unique'                  => 'Email is already in use. Please login or use another email.',
            'number.required'               => 'Phone number is required for contact and verification.',
            'number.min'                    => 'Please enter a valid phone number (eg. 98xxxxxxxx).',
            'number.numeric'                => 'Please enter a valid phone number (eg. 98xxxxxxxx).',
            'number.regex'                  => 'Please enter a valid phone number (eg. 98xxxxxxxx).',
            'address.required'              => 'Address is required for billing.',
            'username.required'             => 'Username is to be used for identification and must be unique.',
            'username.unique'               => 'Username is already taken.',
            'password.required'             => 'Password is required.',
            'password.min'                  => 'Password must be at least 8 characters.',
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha'  => 'Captcha error! Please try again later or contact us.',
        ];
    }
}
