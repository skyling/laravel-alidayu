<?php
/**
 * User: Frank
 * Date: 2016/9/6
 * Time: 15:09
 */
namespace Skyling\Alidayu;

use \Illuminate\Support\ServiceProvider;
class AlidayuServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->singleton('alidayu', function ($app) {
            return new Alidayu();
        });
    }


}