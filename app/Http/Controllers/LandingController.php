<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class LandingController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('pages/landing/index')->with([
            'title' => 'Laravel SaaS Starter',
        ]);
    }
}
