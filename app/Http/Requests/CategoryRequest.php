<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Auth::check();
    }

    public function rules()
    {   
        return [
            "name" => "required",
            "slug" => "required"
            // "grn_code" => "required|numeric"
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This Name is required.',
            'slug.required' => 'This Slug is required.'
        ];
    }

    public function forbiddenResgrnnse() {
        return $this->redirector->to("/");
    }
}
