<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

it('has auth user', function () {
    actingAsAdminRole();
    expect(user())->toBe(Auth::user());
});

it('has capitalize world', function () {
    $text = 'lorem iPSUM doLOR Sit AMET';

    expect(capitalize($text))->toBe('Lorem Ipsum Dolor Sit Amet');
});

it('has formating date', function () {
    $date = now()->toDateString();
    expect(format_date($date))->toBe(now()->format('d F Y'));

    // locale
    Carbon::setLocale('id');
    $date = '2022-01-02';
    expect(format_date($date))->toBe('02 Januari 2022');
});

it('should formating number', function () {
    $number = 2000000;
    expect(format_number($number))->toBe('2.000.000');
});

it('should clean number', function () {
    $number = '2.000.000';
    expect(clean_number($number))->toBeInt();
    expect(clean_number($number))->toBe(2000000);
});

it('should file size for humans', function () {
    $size = file_size_convert(11024);
    expect($size)->toBe('10,77 KB');
});
