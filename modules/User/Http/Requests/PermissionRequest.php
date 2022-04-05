<?php

namespace Modules\User\Http\Requests;

use App\Abstracts\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class PermissionRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'name' => 'permission name',
        ];
    }

    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('permissions', 'name')->ignore($this->route('permission'))],
            'guard' => ['required'],
            'description' => ['nullable'],
        ];
    }

    public function getData()
    {
        return array_merge(Arr::except($this->validated(), 'guard'), [
            'guard_name' => $this->guard,
        ]);
    }
}
