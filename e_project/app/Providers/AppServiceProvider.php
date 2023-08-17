<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

use App\Models\categories;

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
        //
        View::composer('layouts.app', function ($view) {
            $menus = DB::table('categories')
                ->whereNull('parent_id')
                ->get();

            foreach ($menus as $menu) {
                $menu->submenus = DB::table('categories')
                    ->where('parent_id', $menu->id)
                    ->get();
            }
            return $view->with('menus',$menus);
        });
    }
}
