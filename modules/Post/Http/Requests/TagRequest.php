<?php

namespace Modules\Post\Http\Requests;

use App\Abstracts\FormRequest;
use Illuminate\Validation\Rule;

class TagRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', Rule::unique('tags', 'name')->ignore($this->route('tag'))],
            'description' => ['nullable', 'string'],
        ];
    }
}
