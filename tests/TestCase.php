<?php

namespace Trungpv1601\SimpleCrudGenerator\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Trungpv1601\SimpleCrudGenerator\SimpleCrudGeneratorServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            SimpleCrudGeneratorServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        /*
        include_once __DIR__.'/../database/migrations/create_simple_crud_generator_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}
