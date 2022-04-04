<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\UploadModuleRequest;
use Inertia\Response;
use Nwidart\Modules\Facades\Module;

class ModuleController extends Controller
{
    public function __invoke(): Response
    {
        // $module = Module::find('skeleton');
        // if (!$module->enable()) {
        //     $module->enable();
        // }

        return inertia('setting/module/index')
            ->with(['modules' => Module::collections()])
            ->title(__('Manage Module'));
    }
}
