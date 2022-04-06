<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\ModuleUploadRequest;
use App\Jobs\Setting\ModuleUploadedJob;

class ModuleUploadController extends Controller
{
    public function __invoke(ModuleUploadRequest $request)
    {
        $filename = $request->getFile()->store('modules');

        dispatch_sync(new ModuleUploadedJob($filename, $request->getFile()->getClientOriginalName()));
    }
}
