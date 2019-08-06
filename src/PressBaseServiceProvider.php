<?php

namespace egber\Press;
use Illuminate\Support\ServiceProvider;

class PressBaseServiceProvider extends ServiceProvider 
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    
    public function boot()
    {
        $this->registerResource();
    }
    
    public function register()
    {

    }

    protected function registerResource(){
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

}