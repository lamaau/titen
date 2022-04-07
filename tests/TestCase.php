<?php

namespace Tests;

use Illuminate\Console\Scheduling\Event as ScheduleEvent;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Events\MigrationsEnded;
use Illuminate\Foundation\Mix;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\File;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication,
        RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->initializeTempDirectory();

        // Swap out the Mix manifest implementation, so we don't need
        // to run the npm commands to generate a manifest file for
        // the assets in order to run tests that return views.
        $this->swap(Mix::class, function () {
            return '';
        });

        $this->artisan('db:seed');

        Event::listen(MigrationsEnded::class, function () {
            $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        });
    }

    public function setNow(int $year, int $month, int $day, int $hour = 0, int $minutes = 0, int $seconds = 0): void
    {
        $date = Carbon::create($year, $month, $day, $hour, $minutes, $seconds);

        Carbon::setTestNow($date);
    }

    public function getTempDirectory(?string $file = null): string
    {
        return storage_path('app/'.env('APP_NAME', 'tamael')).($file ? '/'.$file : '');
    }

    public function initializeTempDirectory()
    {
        $this->initializeDirectory($this->getTempDirectory());
    }

    public function initializeDirectory(string $directory): void
    {
        File::deleteDirectory($directory);

        // File::makeDirectory($directory);
    }

    public function getScheduleEventForCommand(string $commandName, Carbon $atTime = null): Collection
    {
        $schedule = $this->app->get(Schedule::class);

        return collect($schedule->events())->filter(function (ScheduleEvent $event) use ($commandName, $atTime) {
            if (! str_contains($event->command, $commandName) && strcmp($event->description, $commandName) !== 0) {
                return false;
            }

            // optionally filter out events that are not due at the given time.
            if ($atTime !== null) {
                Carbon::setTestNow($atTime);

                return $event->isDue($this->app);
            } else {
                return true;
            }
        });
    }
}
