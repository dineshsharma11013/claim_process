<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UsersSignUp;
use App\MailService\UserSignUpService;

class userSignUp extends ServiceProvider
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
        $this->app->bind(UsersSignUp::class, function ($app) {
            return new UserSignUpService();
        });
    }
}
