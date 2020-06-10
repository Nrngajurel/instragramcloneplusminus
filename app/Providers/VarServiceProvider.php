<?php

namespace App\Providers;

use App\Http\View\Compoer\CatComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class VarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['public.inc.sidebar'], CatComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
