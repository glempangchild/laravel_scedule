<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cron\CronExpression;
use Illuminate\Support\Facades\Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Validator::extend('cron_expression', function ($attribute, $value, $parameters, $validator) {
        return CronExpression::isValidExpression( $value );
        });
    }
}
