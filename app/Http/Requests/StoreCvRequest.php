<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCvRequest extends FormRequest
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
            'subject' => ['bail', 'required', 'string', 'max:60'],
            'region' => ['bail', 'required', 'integer', 'between:1,3'],
            'domain' => ['bail', 'required', 'string', 'max:55', 'exists:companies,domain'],
            'discount' => ['bail', 'nullable', 'max:255'],
            'fullname' => ['bail', 'required', 'string', 'max:80', 'full_name_parts'],
            'age' => ['bail', 'required', 'integer', 'between:1,5'],
            'qualifications' => ['bail', 'required', 'string', 'max:60'],
            'university' => ['bail', 'required', 'string', 'max:60'],
            'major' => ['bail', 'required', 'string', 'max:60'],
            'work' => ['bail', 'nullable', 'string', 'max:60'],
            'experince' => ['bail', 'nullable', 'integer', 'max:60'],
            'birthday' => ['bail', 'required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'gender' => ['bail', 'required', 'integer', 'between:1,2'],
            'socialStatus' => ['bail', 'required', 'integer', 'between:1,3'],
            'nationality' => ['bail', 'required', 'string', 'max:10'],
            'linkedin' => ['bail', 'nullable', 'url', 'max:255'],
            'file' => [
                'bail',
                'nullable',
                'file',
                'mimes:pdf',
                'mimetypes:application/pdf',
                'max:10240', // 10MB
            ],
            'selectedPlan' => ['bail', 'required', 'integer', 'between:1,3'],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'birthday.before_or_equal' => 'يجب أن يكون عمرك 18 عامًا أو أكثر لإستخدام هذه الخدمة',
            'fullname.full_name_parts' => 'الرجاء إدخال الاسم الكامل',
            'region.between' => 'المنطقة المختارة غير صحيحة',
            'domain.exists' => 'المجال المختار غير موجود',
            'file.mimes' => 'يجب أن يكون الملف من نوع PDF',
            'linkedin.url' => 'يجب أن يكون رابط LinkedIn صحيح',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'subject' => trim($this->subject ?? ''),
            'domain' => trim($this->domain ?? ''),
            'fullname' => trim($this->fullname ?? ''),
            'qualifications' => trim($this->qualifications ?? ''),
            'university' => trim($this->university ?? ''),
            'major' => trim($this->major ?? ''),
            'work' => trim($this->work ?? ''),
            'nationality' => trim($this->nationality ?? ''),
            'linkedin' => trim($this->linkedin ?? ''),
            'discount' => trim($this->discount ?? ''),
        ]);
    }
}
