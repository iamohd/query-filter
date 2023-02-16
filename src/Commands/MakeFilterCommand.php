<?php

namespace Smartisan\QueryFilter\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeFilterCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     */
    public $signature = 'make:filter {name}';

    /**
     * The console command description.
     */
    public $description = 'Create a new QueryFilter class';

    /**
     * The type of class being generated.
     */
    protected $type = 'QueryFilter';

    /**
     * Get the stub file for the generator.
     */
    protected function getStub(): string
    {
        return __DIR__.'/../../stubs/QueryFilter.stub';
    }

    /**
     * Get the default namespace for the class.
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return config('query-filter.namespace');
    }
}
