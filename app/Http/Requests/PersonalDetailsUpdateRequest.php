<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PersonalDetailsUpdateRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpeg,jpg|max:2048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'f_name' => 'nullable|string|max:255',
            'm_name' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:Male,Female,Other',
            'religion' => 'nullable|string|max:100',
            'married_status' => 'required|in:Unmarried,Married,Divorced,Single',
            'nationality' => 'required|string|max:100',
            'national_id' => 'nullable|string|max:20|unique:personal_details,national_id,'.userAuthId(),
            'passport_no' => 'nullable|string|max:20|unique:personal_details,passport_no,'.userAuthId(),
            'issue_date' => 'nullable|date|before_or_equal:today',
            // 'mobile' => 'required|string|regex:/^\+?[0-9]{10,15}$/|unique:personal_details,mobile,'.userAuthId(),
            'mobile_home' => 'nullable|string|regex:/^\+?[0-9]{10,15}$/',
            'mobile_office' => 'nullable|string|regex:/^\+?[0-9]{10,15}$/',
            // 'email' => 'required|email|max:255|unique:personal_details,email,'.userAuthId(),
            'extra_email' => 'nullable|email|max:255',
            'blood_group' => 'nullable|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
            'height' => 'nullable|numeric|max:300', //min:50| Height in cm
            'weight' => 'nullable|numeric|min:1|max:300',  // Weight in kg
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'The first name field is required.',
            'last_name.required' => 'The last name field is required.',
            'date_of_birth.before' => 'The date of birth must be a date before today.',
            'gender.in' => 'The gender must be one of the following: Male, Female, or Uther.',
            'mobile.required' => 'The mobile number is required.',
            'mobile.string' => 'The mobile number must be a valid string.',
            'mobile.regex' => 'The mobile number must be between 10 and 15 digits and may start with a +.',
            'mobile.unique' => 'The mobile number has already been taken.',
        ];
    }
    
}
