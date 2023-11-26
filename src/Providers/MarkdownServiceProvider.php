<?php

namespace Kenura\Mardock\Providers;

use Illuminate\Support\ServiceProvider;

class MarkdownServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__ . '/../config/markdown.php' => config_path('markdown.php'),
        ], 'markdown-config');

        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations')
        ], 'markdown-migrations');

        $this->publishes([
            __DIR__ . '/../views' => resource_path('views/kenura/markdown'),
        ], 'markdown-views');

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../views', 'mardock');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}