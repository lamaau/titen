<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Inertable\Setting\PermissionTable;
use App\Http\Requests\Setting\PermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return inertia('setting/permission/index')->inertable(new PermissionTable);
    }

    public function store(PermissionRequest $request)
    {
        DB::transaction(function () use ($request) {
            Permission::create($request->getData());
        });

        return back();
    }
}
