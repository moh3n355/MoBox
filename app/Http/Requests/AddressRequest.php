<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'city'        => 'required|string|min:3|max:50',
            'street'      => 'required|string|min:3|max:50',
            'alley'       => 'required|string|min:3|max:50',
            'plaque'      => 'required|integer',
            'floor'       => 'required|integer',
            'describtion' => 'nullable|string|max:255', 
        ];
    }
}
