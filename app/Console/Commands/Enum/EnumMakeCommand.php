<?php

declare(strict_types=1);

namespace App\Console\Commands\Enum;

use Illuminate\Console\GeneratorCommand;

class EnumMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:enum';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new enum class instance';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/enum.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Enums';
    }
}
