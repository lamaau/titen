<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Inertia\Response;
use Modules\Post\Datatable\CategoryDatatable;
use Modules\Post\Entities\Category;
use Modules\Post\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(): Response
    {
        return inertia('Post::category/index')->inertable(new CategoryDatatable)->title(__('Manage Category'));
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        return back()->with(['success' => 'Successfully add new category']);
    }

    public function update(Category $category, CategoryRequest $request): RedirectResponse
    {
        $category->update($request->validated());

        return back()->with(['success' => 'Successfully update category']);
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return back()->with(['success' => 'Successfully delete category']);
    }
}
