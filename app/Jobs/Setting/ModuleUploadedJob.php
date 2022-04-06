<?php

namespace App\Jobs\Setting;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use ZipArchive;

class ModuleUploadedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private readonly string $filename,
        private readonly string $originalFileName
    ) {
    }

    public function handle()
    {
        $path = storage_path("app/public/{$this->filename}");
        $realName = pathinfo($this->originalFileName, PATHINFO_FILENAME);

        $zip = new ZipArchive();
        if ($zip->open($path)) {
            $zip->extractTo(storage_path('app/public/modules/tmp'));
            $zip->close();

            $modulePath = storage_path("app/public/modules/tmp/{$realName}");

            if (! file_exists("{$modulePath}/module.json")) {
                throw new \Exception('Module json file not exists', 1);
            }

            $c = file_get_contents("{$modulePath}/module.json");
            $contents = json_decode($c, true);

            File::move($modulePath, __DIR__."/../../../modules/{$contents['name']}");
        }
    }
}
