<?php

namespace Modules\Post\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Post\Entities\Post;
use Modules\Post\Http\Requests\PostRequest;

class PostAction
{
    public static function create(PostRequest $request)
    {
        DB::transaction(function () use ($request) {
            Post::create($request->validated());
        });
    }

    public static function update(Post $post, PostRequest $request)
    {
        DB::transaction(function () use ($post, $request) {
            $post->update($request->validated());
        });
    }

    public static function destroy(Post $post)
    {
        DB::transaction(function () use ($post) {
            $post->delete();
        });
    }
}
