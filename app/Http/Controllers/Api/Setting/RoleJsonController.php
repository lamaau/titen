<?php

namespace App\Http\Controllers\Api\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Setting\RoleResource;

class RoleJsonController extends Controller
{
    public function index(Request $request)
    {
        return new RoleResource($request);
    }
}
