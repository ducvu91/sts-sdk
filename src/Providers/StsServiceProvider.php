<?php
namespace DaiDP\StsSDK\Providers;

use DaiDP\StsSDK\HttpClient\UMClient;
use DaiDP\StsSDK\UserManagement\UserManagement;
use DaiDP\StsSDK\UserManagement\UserManagementInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class StsServiceProvider
 * @package DaiDP\StsSDK\Providers
 * @author DaiDP
 * @since Sep, 2019
 */
class StsServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $path = realpath(__DIR__.'/../../config/config.php');

        $this->publishes([$path => config_path('sts.php')], 'config');
        $this->mergeConfigFrom($path, 'sts');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerUserManagementClient();

        $this->app->singleton(UserManagementInterface::class, UserManagement::class);
    }

    /**
     * Đăng ký User management
     */
    protected function registerUserManagementClient()
    {
        $this->app->singleton('daidp.sts.user_client', function () {
            return new UMClient($this->config('user_management'));
        });
    }

    /**
     * Đăng ký Tenant management
     */
    protected function registerTenantManagementClient()
    {
        $this->app->singleton('daidp.sts.tenant_client', function () {
            return new UMClient($this->config('user_management'));
        });
    }

    /**
     * Helper to get the config values.
     *
     * @param  string  $key
     * @param  string  $default
     *
     * @return mixed
     */
    protected function config($key, $default = null)
    {
        return config("sts.$key", $default);
    }
}