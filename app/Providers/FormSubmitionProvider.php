<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserRegistration;
use App\MailService\UserFormSubmition;

class FormSubmitionProvider extends ServiceProvider
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
        $this->app->bind(UserRegistration::class, function ($app) {
            return new UserFormSubmition();
        });
    }
}
