<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\RoleRequest;
use App\Inertable\Setting\RoleTable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Inertia\Response;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(): Response
    {
        return inertia('User::role/index')->inertable(new RoleTable)->title(__('Role'));
    }

    public function create(): Response
    {
        return inertia('User::role/create')->title(__('New role'));
    }

    public function store(RoleRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            Role::create($request->getData());
        });

        return back();
    }
}
