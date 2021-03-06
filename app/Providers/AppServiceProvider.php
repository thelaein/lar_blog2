<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use PhpParser\Node\Expr\Cast\Object_;


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
        Paginator::useBootstrap();

        DB::listen(function ($q){
            logger($q->sql,$q->bindings);
        });

//        if (Schema::hasTable('categories')){
//            View::share('my',(Object)['name'=>'Thel Aein','age'=>23]);

//        }

        View::composer(['home','auth.login'],function (){
            View::share('my',Category::all());
        });



        Blade::if('isAdmin',function (){
            return Auth::user()->role == 0;
        });
    }
}
