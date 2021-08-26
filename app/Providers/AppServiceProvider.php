<?php

namespace App\Providers;
use App\Models\Social;
use App\Models\News;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer(['includes.*'],function($view){
            $view->with('social', Social::first());
        });
        View::composer(['includes.*'],function($view){
            $view->with('popular_news', News::take(4)->get());
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
