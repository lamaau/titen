<?php

use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;

beforeEach(function () {
    Event::fake();

    Notification::fake();

    app()->detectEnvironment(function () {
        return 'production';
    });
});

it('should dispatch success event listener', function () {
    createUser([
        'email' => 'johndoe@mail.com',
        'password' => 'secret',
    ]);

    $this->post(route('login.store'), [
        'email' => 'johndoe@mail.com',
        'password' => 'secret',
    ]);
});

it('should dispatch failed event listener', function () {
    createUser([
        'email' => 'johndoe@mail.com',
        'password' => 'secret',
    ]);

    $this->post(route('login.store'), [
        'email' => 'wrongemail@mail.com',
        'password' => 'secret',
    ]);
});

it('should send success notification to telegram', function () {
    $user = createUser([
        'email' => 'johndoe@mail.com',
        'password' => 'secret',
    ]);

    $this->post(route('login.store'), [
        'email' => 'johndoe@mail.com',
        'password' => 'secret',
    ]);

    // $event = new Login('web', $user, true);
    // $listener = new SuccessListener();
    // $listener->handle($event);
});

it('should send failed notification to telegram', function () {
    createUser([
        'email' => 'johndoe@mail.com',
        'password' => 'secret',
    ]);

    $wrongCredentials = [
        'email' => 'wrongemail@mail.com',
        'password' => 'secret',
    ];

    $this->post(route('login.store'), $wrongCredentials);

    $event = new Failed('web', null, $wrongCredentials);

    // $listener = new FailedListener();
    // $listener->handle($event);
});
