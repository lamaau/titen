<?php

use App\Models\User;
use function Pest\Laravel\actingAs;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

uses(Tests\TestCase::class)->in(__DIR__);

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

expect()->extend('toBe', function ($value) {
    return $this->toBe($value);
});

expect()->extend('toBeTrue', function () {
    return $this->toBe(true);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function createUser($attributes = [])
{
    return User::factory()->create($attributes);
}

function actingAsGeneralUser()
{
    createUser(['email' => 'general@mail.com']);
    $user = User::firstWhere('email', 'general@mail.com');

    return actingAs($user);
}

function actingAsAdminRole()
{
    $admin = User::firstWhere('email', 'admin@mail.com');

    return actingAs($admin);
}
