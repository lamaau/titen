<?php

namespace App\Http\Requests\Setting;

use Illuminate\Support\Arr;
use App\Abstracts\FormRequest;
use Illuminate\Validation\Rule;

class PermissionRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'name' => 'Permission Name'
        ];
    }

    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('permissions', 'name')],
            'display_name' => ['nullable'],
            'guard' => ['required']
        ];
    }

    public function getData()
    {
        return array_merge(Arr::except($this->validated(), 'guard'), [
            'guard_name' => $this->guard,
        ]);
    }
}
