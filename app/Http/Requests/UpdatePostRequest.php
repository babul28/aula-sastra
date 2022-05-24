<?php

namespace App\Http\Requests;

use App\Enums\PostTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:200'],
            'body' => ['required', 'string'],
            'type' => ['required', 'string', Rule::in(PostTypeEnum::getValues())],
            'status' => ['required', 'string', Rule::in(['draft', 'published'])],
            'slug' => ['required', 'string'],

            'meta' => ['array'],
            'meta.title' => ['nullable', 'string', 'max:200'],
            'meta.description' => ['nullable', 'string'],

            'featured_image' => ['nullable', 'image'],
        ];
    }
}
