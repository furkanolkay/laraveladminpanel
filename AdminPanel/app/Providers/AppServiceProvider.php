<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Sponsors;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer("frontend.include.header",function ($view){
    $view->with("sponsors",Sponsors::distinct()->get("sponsor_year"));


        });
        view()->composer("layouts.frontend",function ($view){
            $view->with("contact",Contact::find(1));


        });
    }
}
