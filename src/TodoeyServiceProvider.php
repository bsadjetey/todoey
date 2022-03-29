<?php

namespace Bsadjetey\Todoey;

use Illuminate\Support\ServiceProvider;

class TodoeyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->make('Finetick\Calculator\CalculatorController');
        $this->app->make('Bsadjetey\Todoey\TaskController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->loadRoutesFrom(__DIR__.'/routes.php');
        include __DIR__.'/routes.php';
//        $this->loadMigrationsFrom(__DIR__ . '../migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'todoey');
        $this->publishes([ __DIR__.'/views' => base_path('resources/views/msystems/todoey')]);
        $this->publishes([__DIR__ . '/migrations/create_task_table.php.stub' =>
            database_path('migrations/' . date('Y_m_d_His', time()) . '_create_tasks_table.php'),
            // you can add any number of migrations here
        ], 'migrations');
//        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');


    }
}
