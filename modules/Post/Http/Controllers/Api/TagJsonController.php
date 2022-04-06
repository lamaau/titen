<?php

namespace Modules\Post\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Modules\Post\Entities\Tag;
use Modules\Post\Transformers\TagResource;

class TagJsonController extends Controller
{
    public function index()
    {
        // code...
    }

    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }
}
