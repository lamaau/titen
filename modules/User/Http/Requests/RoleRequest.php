<?php

namespace App\Http\Requests\Setting;

use App\Abstracts\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'name' => 'Role Name',
        ];
    }

    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('roles', 'name')->ignore($this->route('role'))],
            'guard' => ['required'],
        ];
    }

    public function getData()
    {
        return [
            'name' => $this->name,
            'guard_name' => $this->guard,
        ];
    }
}
