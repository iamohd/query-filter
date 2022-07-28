<?php

namespace Smartisan\QueryFilter\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        $this->loadMigrations();
        $this->loadFactories();
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');

        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    protected function loadMigrations()
    {
        include_once __DIR__ . '/Migrations/2021_03_17_000000_create_users_table.php';
        (new \CreateUsersTable())->up();
    }

    protected function loadFactories()
    {
        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Smartisan\\QueryFilter\\Tests\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }
}
