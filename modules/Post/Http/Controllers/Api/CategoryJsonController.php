<?php

namespace Modules\Post\Http\Controllers\Api;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Category;
use Modules\Post\Transformers\CategoryResource;

class CategoryJsonController extends Controller
{
    public function index()
    {
        // code...
    }

    public function show(Category $category)
    {
        return CategoryResource::make($category);
    }
}
