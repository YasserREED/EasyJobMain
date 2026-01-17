<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyPaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'tranRef' => ['bail', 'required', 'string', 'max:50', 'unique:payments,tran_ref'],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'tranRef.required' => 'رقم المعاملة مطلوب',
            'tranRef.unique' => 'تم التعامل مع هذه المعاملة مسبقًا',
            'tranRef.max' => 'رقم المعاملة غير صحيح',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'tranRef' => trim($this->tranRef ?? ''),
        ]);
    }
}
