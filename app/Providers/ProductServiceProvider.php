<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ProductRepoInterface;
use App\Services\ProductServices;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ProductRepoFacade', function () {
            return new ProductRepoInterface();
        });
        $this->app->bind('ProductServiceFacade', function () {
            return new ProductServices();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
