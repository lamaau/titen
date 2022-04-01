<?php

declare(strict_types=1);

namespace App\Listeners\Auth;

class SuccessListener
{
    public function handle($event)
    {
        $event->user->update(['last_logged_in_at' => now()]);
    }
}
