<?php

use Modules\User\Entities\User;

it('ensure user can see login page', function () {
    $this->get('/auth/login')->assertStatus(200);
});

it("ensure user can't see page with auth middleware before login", function () {
    $this->get('/dashboard')->assertStatus(302);
});

it('ensure user can see page with auth middleware after login', function () {
    $user = createUser([
        'email_verified_at' => now(),
    ]);

    $this->actingAs($user)->get('/dashboard')->assertStatus(200);
});

it('ensure user can login', function () {
    $response = $this->post(route('login.store'), [
        'email' => 'admin@mail.com',
        'password' => 'secret123',
    ]);

    $user = User::firstWhere('email', 'admin@mail.com');

    $response->assertStatus(302);
    $response->assertRedirect(route('dashboard'));

    $this->assertAuthenticatedAs($user);
});
