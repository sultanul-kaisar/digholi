<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\User;
use App\Model\Setting;

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
//        view()->composer([
//                            'frontend.index',
//                            'frontend.about',
//                            'frontend.blog',
//                            'frontend.blog_view',
//                            'frontend.contact',
//                            'frontend.gallery',
//                            'frontend.gallery_view',
//                            'frontend.home',
//                            'frontend.portfolio',
//                            'frontend.portfolio_view',
//                            'frontend.service',
//                            'frontend.team'
//                        ],function($view){
//            $user = User::with('profile')->find(1)->first(
//                [
//                    'id',
//                    'name'
//                ]
//            );
//
//            $seo = Setting::find(1)->first();
//
//            $view->with('user', $user)
//                ->with('seo', $seo);
//        });
    }
}
