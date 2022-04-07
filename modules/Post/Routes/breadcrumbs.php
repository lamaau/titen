<?php

use Modules\Post\Entities\Post;
use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;

// post

Breadcrumbs::for(
    'post.index',
    fn (Trail $trail) => $trail->push(__('Post'), route('post.index'))
);

Breadcrumbs::for(
    'post.create',
    fn (Trail $trail) => $trail->parent('post.index')->push(__('New'), route('post.create'))
);

Breadcrumbs::for(
    'post.edit',
    fn (Trail $trail, Post $post) => $trail->parent('post.index')->push(__('Edit'), route('post.edit', $post))
);

// tag & category

Breadcrumbs::for(
    'tag.index',
    fn (Trail $trail) => $trail->push(__('Tag'), route('tag.index'))
);

Breadcrumbs::for(
    'category.index',
    fn (Trail $trail) => $trail->push(__('Category'), route('category.index'))
);
