<?php

namespace Modules\User\Http\Controllers;

use App\Inertable\Setting\UserTable;
use Illuminate\Routing\Controller;
use Inertia\Response;

class UserController extends Controller
{
    public function index(): Response
    {
        return inertia('User::user/index')->inertable(new UserTable);
    }

    public function create(): Response
    {
        return inertia('User::user/create');
    }
}
