<?php

namespace Modules\Post\Http\Requests;

use App\Abstracts\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'slug' => ['required', 'string', Rule::unique('posts', 'slug')->ignore($this->route('post'))],
            'content' => ['required', 'string'],
        ];
    }
}
