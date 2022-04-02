<?php

namespace App\Http\Controllers\Api\Setting;

use App\Http\Controllers\Controller;
use App\Http\Resources\Setting\RoleResource;
use Illuminate\Http\Request;

class RoleJsonController extends Controller
{
    public function index(Request $request)
    {
        return new RoleResource($request);
    }
}
