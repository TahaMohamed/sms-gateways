<?php

namespace TahaMohamed\SMSGateway;

use Illuminate\Support\ServiceProvider;

class SMSGatewayServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tahamohamed');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/smsgateway.php', 'smsgateway');

        // Register the service the package provides.
        $this->app->singleton('smsgateway', function ($app) {
            return new SMSGateway;
        });
        $this->app->singleton('hisms', function ($app) {
            return new Gateways\Hisms(@$app['config']['smsgateway']['hisms']);
        });
        $this->app->singleton('netpowers', function ($app) {
            return new Gateways\NetPowers(@$app['config']['smsgateway']['netpowers']);
        });
        $this->app->singleton('appgateway', function ($app) {
            return new Gateways\SMSGateway(@$app['config']['smsgateway']['smsgateway']);
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['smsgateway'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/smsgateway.php' => config_path('smsgateway.php'),
        ], 'smsgateway.config');

    }
}
