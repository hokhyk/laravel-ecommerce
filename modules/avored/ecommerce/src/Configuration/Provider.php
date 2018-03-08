<?php
namespace AvoRed\Ecommerce\Configuration;

use Illuminate\Support\ServiceProvider;
use AvoRed\Ecommerce\Configuration\Facade as AdminConfiguration;

class Provider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAdminConfiguration();
        $this->app->alias('configuration', 'AvoRed\Ecommerce\Configuration\Manager');
    }
    /**
     * Register the AdmainConfiguration instance.
     *
     * @return void
     */
    protected function registerAdminConfiguration()
    {
        $this->app->singleton('configuration', function ($app) {
            return new Manager();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['configuration', 'AvoRed\Ecommerce\Configuration\Manager'];
    }

}