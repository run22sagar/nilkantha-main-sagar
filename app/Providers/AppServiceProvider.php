<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Post;
use Illuminate\Support\Facades\Config;
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

        view()->composer('*',function ($view){
            $configurations = Post::select('id','title','image_path')->firstWhere('category', "landing_page");
            $contact = Contact::select('address','phone','email')->first();
            Config::set('configurations', $configurations);
            Config::set('contact', $contact);
        });
    }
}
