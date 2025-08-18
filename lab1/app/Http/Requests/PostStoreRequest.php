<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            //
            'title' => 'required|string|max:5',
            'description' => 'required|string|min:10',
            'post_creator' => 'required|exists:users,id',
       
        ];
    }

     public function messages(): array
    {
        return [
            'title.required'   => 'title requires',
            'title.min'        => 'title must be at least :min characters.',
            'title.max'        => 'title may not be greater than :max characters.',
            'title.unique'     => 'title has already been taken.',

            'description.required' => 'description is required.',
            'description.min'      => 'description must be at least :min characters.',

            'slug.required'    => 'slug is required.',
            'slug.unique'      => 'slug has already been taken.',
        ];
    }
}
