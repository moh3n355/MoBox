<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // اعتبارسنجی فعال شود
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'set-username' => [
                'required',
                'string',
                'min:3',
                'max:20',
                'regex:/^[A-Za-z][A-Za-z0-9]*$/', // شروع با حرف و فقط حروف و اعداد
            ],
            'set-password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',      // حداقل یک حرف کوچک
                'regex:/[A-Z]/',      // حداقل یک حرف بزرگ
                'regex:/[0-9]/',      // حداقل یک عدد
                'regex:/[@$!%*?&]/',  // حداقل یک کاراکتر خاص
            ],
        ];
    }

    /**
     * Custom error messages
     */
    public function messages(): array
    {
        return [
            'set-username.regex' => 'نام کاربری باید با حرف شروع شود و فقط شامل حروف و اعداد باشد.',
            'password.regex' => 'رمز عبور باید حداقل یک حرف بزرگ، یک حرف کوچک، یک عدد و یک کاراکتر خاص داشته باشد.',
            'set-username.min' => 'نام کاربری باید حداقل 3 کاراکتر باشد.',
            'set-username.max' => 'نام کاربری باید حداکثر 20 کاراکتر باشد.',
            'password.min' => 'رمز عبور باید حداقل 8 کاراکتر باشد.',
        ];
    }
}
