<?php

namespace App\Providers;
use App\Demo\Demo;
use Illuminate\Support\ServiceProvider;

class ExampleServiceContainer extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('Demo', function(){
           return new  Demo();
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
