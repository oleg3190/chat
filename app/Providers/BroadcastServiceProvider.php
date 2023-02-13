<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application Services.
     *
     * @return void
     */
    public function boot()
    {
        //'middleware' => ['auth:sanctum']
        //Broadcast::routes(['auth:sanctum']);
        //Broadcast::routes(['auth:sanctum']);


        require base_path('routes/channels.php');
    }
}
