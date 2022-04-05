<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Inertable\Setting\PermissionTable;
use Modules\User\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    public function index()
    {
        return inertia('setting/permission/index')->inertable(new PermissionTable)->title(__('Permission'));
    }

    public function store(PermissionRequest $request)
    {
        DB::transaction(function () use ($request) {
            Permission::create($request->getData());
        });

        return back();
    }

    public function update(Permission $permission, PermissionRequest $request)
    {
        DB::transaction(fn () => $permission->update($request->getData()));

        return back();
    }

    public function destroy(Permission $permission)
    {
        DB::transaction(fn () => $permission->delete());

        return back();
    }
}
