<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Constracts\Repositories\Acl\User\UserInterface','App\Constracts\Repositories\Acl\User\UserEloquent');
        $this->app->bind('App\Constracts\Repositories\Category\CategoryInterface','App\Constracts\Repositories\Category\CategoryEloquent');
        $this->app->bind('App\Constracts\Repositories\Product\ProductInterface','App\Constracts\Repositories\Product\ProductEloquent');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
