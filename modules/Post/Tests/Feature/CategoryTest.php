<?php

use Modules\Post\Entities\Category;

uses(Tests\TestCase::class);

beforeEach(function () {
    actingAsGeneralUser();
});

it('has index page', function () {
    $res = $this->get(route('category.index'));
    $res->assertStatus(200);
});

it('can add new', function () {
    $this->post(route('category.store'), [
        'name' => 'new-category',
    ])->assertStatus(302)->assertSessionHasNoErrors();

    $this->assertDatabaseCount('categories', 1);
    $this->assertDatabaseHas('categories', ['name' => 'new-category']);
});

it('can see name required error', function () {
    $this->post(route('category.store'), [
        'name' => null,
    ])->assertSessionHasErrors(['name']);
});

it('can update category', function () {
    $category = Category::factory()->create([
        'name' => 'old-category',
    ]);

    $this->put(route('category.update', $category->id), [
        'name' => 'new-category',
    ])->assertStatus(302)->assertSessionHasNoErrors();

    $this->assertDatabaseCount('categories', 1);
    $this->assertDatabaseHas('categories', ['name' => 'new-category']);
});

it('can delete', function () {
    $category = Category::factory()->create([
        'name' => 'old-category',
    ]);

    $this->delete(route('category.destroy', $category->id));

    $this->assertDatabaseHas('categories', [
        'deleted_at' => now(),
    ]);
});

it('has soft deleted', function () {
    $category = Category::factory()->create([
        'name' => 'old-category',
    ]);

    $category->delete();

    $this->assertSoftDeleted($category);
});
