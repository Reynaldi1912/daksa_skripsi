<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaptchaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'captcha' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'captcha.required' => 'Captcha harus diisi.',
            'captcha.captcha' => 'Captcha yang dimasukkan tidak valid.',
        ];
    }
}
