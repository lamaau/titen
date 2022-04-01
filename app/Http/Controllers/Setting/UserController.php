<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Inertable\Setting\UserTable;
use Inertia\Response;

class UserController extends Controller
{
    public function index(): Response
    {
        return inertia('setting/user/index')->inertable(new UserTable);
    }

    public function create(): Response
    {
        return inertia('setting/user/create');
    }
}
