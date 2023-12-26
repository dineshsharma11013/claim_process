<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserFormNotification;
use App\MailService\UserFormNotify;


class FormNotification extends ServiceProvider
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
        $this->app->bind(UserFormNotification::class, function ($app) {
            return new UserFormNotify();
        });
    }
}
