<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
{
    public function authorize()
    {
        // فقط کاربران لاگین شده مجاز هستند
        return auth()->check();
    }

    public function rules()
    {
        $userId = auth()->id(); // کاربر فعلی

        return [
            'username'    => 'required|string|min:3|max:50|unique:users,username,' . $userId,
            'fullName'    => 'string|min:3|max:100',
            'email'       => 'email|max:255|unique:users,email,' . $userId,
            'address'     => 'nullable|string|max:255|min:10',
            'OldPassword' => 'nullable|string|min:6',
            'NwePassword' => [  
                'nullable',
                'string',
                'min:8',
                'regex:/[a-z]/',      // حداقل یک حرف کوچک
                'regex:/[A-Z]/',      // حداقل یک حرف بزرگ
                'regex:/[0-9]/',      // حداقل یک عدد
                'regex:/[@$!%*?&]/',  // حداقل یک کاراکتر خاص
            ],
        ];
    }

    public function messages()
    {
        return [
        'username.required'      => 'لطفاً نام کاربری را وارد کنید.',
        'username.string'        => 'نام کاربری باید شامل حروف و اعداد باشد.',
        'username.min'           => 'نام کاربری حداقل باید ۳ کاراکتر باشد.',
        'username.max'           => 'نام کاربری نمی‌تواند بیش از ۵۰ کاراکتر باشد.',
        'username.unique'        => 'این نام کاربری قبلاً استفاده شده است.',

        'fullName.required'      => 'لطفاً نام و نام خانوادگی خود را وارد کنید.',
        'fullName.string'        => 'نام و نام خانوادگی باید شامل حروف باشد.',
        'fullName.min'           => 'نام و نام خانوادگی حداقل ۳ کاراکتر باشد.',
        'fullName.max'           => 'نام و نام خانوادگی نمی‌تواند بیش از ۱۰۰ کاراکتر باشد.',

        'email.required'         => 'لطفاً ایمیل خود را وارد کنید.',
        'email.email'            => 'فرمت ایمیل معتبر نیست.',
        'email.max'              => 'ایمیل نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',
        'email.unique'           => 'این ایمیل قبلاً استفاده شده است.',

        'address.string'         => 'آدرس باید رشته باشد.',
        'address.max'            => 'آدرس نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',
        'address.min'            => 'آدرس نمی‌تواند کمتر از 10 کاراکتر باشد.',

        'OldPassword.min'        => 'رمز عبور قدیمی حداقل ۶ کاراکتر باشد.',

        'NwePassword.min'        => 'رمز عبور جدید حداقل ۸ کاراکتر باشد.',
        'NwePassword.confirmed'  => 'رمز عبور جدید با تکرار آن مطابقت ندارد.',
        'NwePassword.regex'      => 'رمز عبور باید شامل حروف بزرگ و کوچک، عدد و کاراکتر خاص باشد.',
        ];
    }
}
