<?php

namespace App\Http\Requests\Setting;

use App\Abstracts\FormRequest;
use Illuminate\Http\UploadedFile;

class ModuleUploadRequest extends FormRequest
{
    public function rules()
    {
        return [
            //
        ];
    }

    public function getFile(): UploadedFile
    {
        return $this->file;
    }
}
