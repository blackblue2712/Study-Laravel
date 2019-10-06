<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;
class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('cap', function($str){
            return Response::make(strtoupper($str));
        });

        Response::macro('contact', function($action){
            $form = '<form action = "'.$action.'" method="POST">
                        Name <input type="text" name="name"> 
                        Address <input type="text" name="adress">
                    </form>';
            return Response::make($form);
        });
    }
}
