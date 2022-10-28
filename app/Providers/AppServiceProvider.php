<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

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
        // https://laravel.com/docs/9.x/eloquent#enabling-eloquent-strict-mode
        Model::shouldBeStrict(!app()->isProduction());

        // Ignore $guarded/$protected stuff with Eloquent models
        Model::unguard();

        // Only allow admins to access the /log-viewer routes
        LogViewer::auth(function (Request $request) {
            return $request->user() && $request->user()->hasRole('admin');
        });
    }
}
