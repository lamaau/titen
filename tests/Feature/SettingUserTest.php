<?php

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
