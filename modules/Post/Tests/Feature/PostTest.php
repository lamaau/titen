<?php

use Illuminate\Support\Str;
use Modules\Post\Entities\Post;

uses(Tests\TestCase::class);

beforeEach(function () {
    actingAsGeneralUser();
});

it('has post page', function () {
    $this->get(route('post.index'))->assertStatus(200);
});

it('has create page', function () {
    $this->get(route('post.create'))->assertStatus(200);
});

it('can see validated required error', function () {
    $this->post(route('post.store'), ['title' => null, 'slug' => null, 'content' => null])
        ->assertSessionHasErrors(['title', 'slug', 'content']);
});

it('can add new post', function () {
    $title = 'This is an sample of title';

    $data = [
        'title' => $title,
        'slug' => Str::slug($title, '-'),
        'content' => Str::random(10),
    ];

    $this->post(route('post.store'), $data)
        ->assertStatus(302)->assertSessionHasNoErrors();

    $this->assertDatabaseCount('posts', 1);
});

it('has edit page', function () {
    $post = Post::factory()->create();

    $this->get(route('post.edit', $post->id))->assertStatus(200);
});

it('can update existing post', function () {
    $post = Post::factory()->create([
        'title' => 'old title',
    ]);

    $this->put(route('post.update', $post->id), [
        'title' => 'new title',
        'slug' => $post->slug,
        'content' => $post->content,
    ])->assertSessionHasNoErrors();

    $this->assertDatabaseCount('posts', 1);
    $this->assertDatabaseHas('posts', [
        'title' => 'new title',
    ]);
});

it('has soft deleted', function () {
    $post = Post::factory()->create();
    $post->delete();

    $this->assertSoftDeleted($post);
});

it('can delete post', function () {
    $post = Post::factory()->create();

    $this->delete(route('post.destroy', $post->id))->assertStatus(302)->assertSessionHas('success');
    $this->assertDatabaseHas('posts', [
        'deleted_at' => now(),
    ]);
});
