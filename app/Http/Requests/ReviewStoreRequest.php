<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:50'],
            'vote' => ['required', 'between:1,5'],
            'comment' => ['required', 'string', 'min:1', 'max:500'],
            'user_id' => ['required', 'numeric']
        ];
    } 
    
}
