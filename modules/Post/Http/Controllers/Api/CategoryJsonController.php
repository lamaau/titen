<?php

namespace Modules\Post\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Category;
use Modules\Post\Http\Requests\CategoryRequest;
use Modules\Post\Transformers\CategoryResource;

class CategoryJsonController extends Controller
{
    public function index(Request $request)
    {
        return CategoryResource::collection(
            Category::query()->whereLike('name', $request->query('q'))->latest()->paginate($request->query('limit', 10))
        );
    }

    public function show(Category $category)
    {
        return CategoryResource::make($category);
    }

    public function store(CategoryRequest $request)
    {
        // 
    }
}
