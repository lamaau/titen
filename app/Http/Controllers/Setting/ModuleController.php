<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Inertia\Response;
use Nwidart\Modules\Facades\Module;

class ModuleController extends Controller
{
    public function __invoke(): Response
    {
        return inertia('setting/module/index')
            ->with(['modules' => Module::collections()])
            ->title(__('Manage Module'));
    }
}
