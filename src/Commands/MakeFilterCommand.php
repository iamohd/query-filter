<?php

namespace Smartisan\QueryFilter\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeFilterCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    public $signature = 'make:filter {name}';

    /**
     * The console command description.
     *
     * @var string|null
     */
    public $description = 'Create a new QueryFilter class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'QueryFilter';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../../stubs/QueryFilter.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return config('query-filter.namespace');
    }
}
