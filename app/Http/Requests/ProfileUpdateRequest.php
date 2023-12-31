<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'surname' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'github' => ['nullable', 'string',],
            'photo' => ['nullable', 'image',],
            'phone' => ['nullable', 'string', 'max:20'],
            'description' => ['nullable', 'string'],
            'skills' => ['nullable', 'string'],
            'email' => ['email:rfc,dns,strict', 'required', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'techs' => ['required']
        ];
    } 
    
    public function messages()
    {
        return [
            "techs.required" => "The technologies field is required.",
            "email.email" => "Email"
        ];
    }
}
