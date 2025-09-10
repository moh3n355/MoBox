<?php  

namespace App\Http\Requests;  

use Illuminate\Foundation\Http\FormRequest;  

class PhoneRequest extends FormRequest  
{  
    /**  
     * Determine if the user is authorized to make this request.  
     */  
    public function authorize(): bool  
    {  
        return true; // باید true باشه تا ولیدیشن اجرا بشه  
    }  

    /**  
     * Get the validation rules that apply to the request.  
     *  
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>  
     */  
    public function rules(): array  
    {  
        return [  
            'phone' => [  
                'required',  
                'regex:/^09\d{9}$/', // شماره ایران: باید با 09 شروع بشه و دقیقا 11 رقم باشه  
            ],  
        ];  
    }  

    /**  
     * پیام‌های خطای شخصی‌سازی‌شده  
     */  
    public function messages(): array  
    {  
        return [  
            'phone.required' => 'لطفاً شماره موبایل خود را وارد کنید.',  
            'phone.regex'    => 'شماره موبایل معتبر نیست. شماره باید با 09 شروع شود و دقیقاً 11 رقم باشد.',  
        ];  
    }  
}  
