<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Inertia\Response;
use Modules\Post\Datatable\TagDatatable;
use Modules\Post\Entities\Tag;
use Modules\Post\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function index(): Response
    {
        return inertia('Post::tag/index')->inertable(new TagDatatable)->title(__('Manage Tag'));
    }

    public function store(TagRequest $request): RedirectResponse
    {
        Tag::create($request->validated());

        return back()->with(['success' => 'Successfully add new tag']);
    }

    public function update(Tag $tag, TagRequest $request): RedirectResponse
    {
        $tag->update($request->validated());

        return back()->with(['success' => 'Successfully update tag']);
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return back()->with(['success' => 'Successfully delete tag']);
    }
}
