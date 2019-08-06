<?php

namespace egber\Press\Test;
use egber\Press\PressBaseServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->withFactories(__DIR__.'/../database/factories');
    }


    protected function getPackageProviders($app)
        {
            return [PressBaseServiceProvider::Class];
        }


    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
        protected function getEnvironmentSetUp($app)
        {
            // Setup default database to use sqlite :memory:
            $app['config']->set('database.default', 'testdb');
            $app['config']->set('database.connections.testdb', [
                'driver'   => 'sqlite',
                'database' => ':memory:',
                'prefix'   => '',
            ]);
        }



}

