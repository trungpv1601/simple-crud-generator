<?php

namespace Trungpv1601\SimpleCrudGenerator;

use Illuminate\Support\ServiceProvider;
use Trungpv1601\SimpleCrudGenerator\Commands\SimpleCrudGeneratorCommand;

class SimpleCrudGeneratorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/simple-crud-generator.php' => config_path('simple-crud-generator.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/simple-crud-generator'),
            ], 'views');

            $migrationFileName = 'create_simple_crud_generator_table.php';
            if (! $this->migrationFileExists($migrationFileName)) {
                $this->publishes([
                    __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
                ], 'migrations');
            }

            $this->commands([
                SimpleCrudGeneratorCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'simple-crud-generator');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/simple-crud-generator.php', 'simple-crud-generator');
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path("migrations/*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }
}
