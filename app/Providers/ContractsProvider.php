<?php

namespace App\Providers;

use App\Services\Test;
use Illuminate\Support\ServiceProvider;

class ContractsProvider extends ServiceProvider
{
    public function boot()
    {
    }


    public function register()
    {
        $this->app->bind('App\Contracts\User\UserContract', 'App\Services\UserService');
        $this->app->bind('App\Contracts\User\RegisterContract', 'App\Services\RegisterService');
        $this->app->bind('App\Contracts\ChatContract', 'App\Services\ChatService');
    }
}
