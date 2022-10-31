<?php

namespace Visanduma\NovaBackNavigation;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Http\Middleware\Authenticate;
use Laravel\Nova\Nova;
use Visanduma\NovaBackNavigation\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadJsonTranslationsFrom(lang_path('vendor/nova-back-navigation'));

        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            Nova::provideToScript([
                'backAble' => request()->is(config('nova-back.enabled_urls', []))
            ]);
        });


        $this->publishes([
            __DIR__.'/../resources/lang' => lang_path('vendor/nova-back-navigation')
        ], 'translations');


        $this->publishes([
            __DIR__.'/../config/nova-back.php' => config_path('nova-back.php')
        ], 'configs');



        Nova::serving(function (ServingNova $event) {
            $localeFile = lang_path('vendor/nova-back-navigation/' . app()->getLocale() . '.json');
            if (File::exists($localeFile)) {
                Nova::translations($localeFile);
            }
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Nova::router(['nova', Authenticate::class, Authorize::class], 'nova-back-navigation')
            ->group(__DIR__.'/../routes/inertia.php');

        Route::middleware(['nova', Authorize::class])
            ->prefix('nova-vendor/nova-back-navigation')
            ->group(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/nova-back.php', 'nova-back');
    }
}
