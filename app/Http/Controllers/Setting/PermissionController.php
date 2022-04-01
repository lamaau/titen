<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\PermissionRequest;
use App\Inertable\Setting\PermissionTable;
use Illuminate\Support\Facades\DB;
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
