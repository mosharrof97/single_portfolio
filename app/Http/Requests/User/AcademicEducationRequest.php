<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AcademicEducationRequest extends FormRequest
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
        $rules = [
            'edu_level' => ['required', 'string'],
            'exam_title' => ['required', 'string'],
            'major_group' => ['required', 'string'],
            'institute_name' => ['required', 'string'],
            'is_foreign_inst' => ['nullable'],
            'foreign_country' => ['nullable', 'string'],
            'result' => ['required', 'string'],
            'passing_year' => ['required'],
            'edu_duration' => ['nullable'],
            'achievement' => ['nullable'],
        ];

        if (request()->input('edu_level') === 'Secondary' || request()->input('edu_level') === 'Higher Secondary') {
            $rules['exam_board'] = ['required', 'string'];
        }

        if (request()->input('result') === 'Grade') {
            $rules['CGPA'] = ['required', 'string'];
            $rules['scale'] = ['required', 'string'];
        }

        if (in_array(request()->input('result'), ['First Division/Class', 'Second Division', 'Third Division'])) {
            $rules['marks'] = ['required', 'string'];
        }

        return $rules;
    }

}
