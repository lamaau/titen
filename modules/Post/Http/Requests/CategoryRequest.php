<?php

namespace Modules\Post\Http\Requests;

use App\Abstracts\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', Rule::unique('categories', 'name')->ignore($this->route('category'))],
            'description' => ['nullable', 'string']
        ];
    }
}
