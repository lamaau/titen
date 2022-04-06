<?php

use Modules\Post\Entities\Tag;

uses(Tests\TestCase::class);

beforeEach(function () {
    actingAsGeneralUser();
});

it('has tag index', function () {
    $res = $this->get(route('tag.index'));
    $res->assertStatus(200);
});

it('can add new', function () {
    $this->post(route('tag.store'), [
        'name' => 'name-test',
    ])->assertSessionHasNoErrors();

    $this->assertDatabaseCount('tags', 1);
});

it('has name validate required error', function () {
    $this->post(route('tag.store'), ['name' => null])
        ->assertSessionHasErrors(['name']);
});

it('can update', function () {
    $tag = Tag::factory()->create([
        'name' => 'old-name',
    ]);

    $this->put(route('tag.update', $tag->id), [
        'name' => 'new-name',
    ])->assertStatus(302)->assertSessionHasNoErrors();

    $this->assertDatabaseCount('tags', 1);
    $this->assertDatabaseHas('tags', ['name' => 'new-name']);
});

it('can delete', function () {
    $tag = Tag::factory()->create([
        'name' => 'old-tag',
    ]);

    $this->delete(route('tag.destroy', $tag->id));

    $this->assertDatabaseHas('tags', [
        'deleted_at' => now(),
    ]);
});

it('has soft deleted', function () {
    $tag = Tag::factory()->create([
        'name' => 'old-tag',
    ]);

    $tag->delete();

    $this->assertSoftDeleted($tag);
});
