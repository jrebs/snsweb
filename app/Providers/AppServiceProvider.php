<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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
        // Behave strictly in development only.
        // https://laravel.com/docs/9.x/eloquent#enabling-eloquent-strict-mode
        Model::shouldBeStrict(!app()->isProduction());

        // Ignore $guarded/$protected stuff with Eloquent models.
        // We know better
        Model::unguard();

        // Only allow admins to access the /log-viewer routes.
        // https://github.com/opcodesio/log-viewer#authorization
        LogViewer::auth(function (Request $request) {
            return $request->user() && $request->user()->hasRole('admin');
        });

        // Admin users are authorized for all policy abilities.
        // https://laravel.com/docs/9.x/authorization#intercepting-gate-checks
        Gate::before(function ($user, $ability) {
            return $user->hasRole('admin');
        });
    }
}
