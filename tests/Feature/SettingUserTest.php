<?php

use App\Models\Setting\Permission;
use Illuminate\Support\Arr;

beforeEach(function () {
    actingAsAdminRole();
});

it('has setting user page', function () {
    $res = $this->get(route('setting.user.index'));
    $res->assertStatus(200);
});

it('has setting role page', function () {
    $res = $this->get(route('setting.role.index'));
    $res->assertStatus(200);
});

it('has setting create new role page', function () {
    $res = $this->get(route('setting.role.create'));
    $res->assertStatus(200);
});

it('has setting permission page', function () {
    $res = $this->get(route('setting.role.permission.index'));
    $res->assertStatus(200);
});

it('can add new permission', function () {
    $data = [
        'name' => 'test-permission',
        'guard' => 'web',
        'description' => 'test-description',
    ];

    $res = $this->post(route('setting.role.permission.store'), $data);
    $res->assertStatus(302);
    $res->assertSessionHasNoErrors();

    $this->assertDatabaseCount('permissions', 1);
    $this->assertDatabaseHas('permissions', array_merge(Arr::except($data, 'guard'), [
        'guard_name' => 'web',
    ]));
});

it('can update permission', function () {
    $permission = Permission::factory()->create([
        'name' => 'before edit',
        'guard_name' => 'web',
    ]);

    $this->assertDatabaseHas('permissions', [
        'name' => 'before edit',
    ]);

    $this->put(route('setting.role.permission.update', $permission->id), [
        'name' => 'after edit',
        'guard' => 'web',
    ])->assertSessionHasNoErrors();

    $this->assertDatabaseHas('permissions', [
        'name' => 'after edit',
    ]);

    $this->assertDatabaseCount('permissions', 1);
});

it('can permanent delete permission', function () {
    Permission::factory(10)->create();

    $res = $this->delete(route('setting.role.permission.destroy', Permission::first()->id));
    $res->assertStatus(302);

    $this->assertDatabaseCount('permissions', 9);
});
