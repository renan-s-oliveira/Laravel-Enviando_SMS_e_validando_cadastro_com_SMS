<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SMS\Providers\InfobipProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Services\SMS\SmsServiceInterface', function ($app) {
            return new InfobipProvider(config('services.infobip.token'), config('services.infobip.url'));
        });
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
