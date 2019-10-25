<?php

namespace LaravelTreats;

use Blade;
use Illuminate\Support\ServiceProvider;

class LaravelTreatsServiceProvider extends ServiceProvider
{
    /** Bootstrap the application services. */
    public function boot()
    {
        // Config
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-treats.php', 'laravel-treats');

        // Routes
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/routes.php';
        }

        // Translations
        $this->loadTranslationsFrom(resource_path('lang/vendor/laravel-treats'), 'LaravelTreats');

        // Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'LaravelTreats');

        $this->publishes([
            __DIR__ . '/../config/laravel-treats.php' => config_path('laravel-treats.php'),
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/laravel-treats'),
            __DIR__ . '/../resources/assets/less' => resource_path('assets/less'),
        ]);

        /*
         * Custom Blade directives
         */

        // Prints HTML for a glyphicon
        /*
        Dimatikan karena Lumen tidak memiliki Blade
        By Yoga Prasetiyo
        Blade::directive('glyphicon', function($expression) {
            return '<?php echo \'<span class="glyphicon glyphicon-\' . ' . $expression . ' . \'"></span>\'; ?>';
        });

        Kemudian Buat Custom Blade :
        */

        $this->bladeDirectives();
    }

    private function bladeDirectives()
    {
        if (!class_exists('\Blade')) return;
        // Call to Entrust::hasRole
        Blade::directive('glyphicon', function($expression) {
            return '<?php echo \'<span class="glyphicon glyphicon-\' . ' . $expression . ' . \'"></span>\'; ?>';
        });
    }

    /** Register the application services. */
    public function register()
    {
        //
    }
}
