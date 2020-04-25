<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\User' => 'App\Policies\UserPolicy',
        'App\Post' => 'App\Policies\PostPolicy',
        'App\Conversation' => 'App\Policies\ConversationPolicy',
        'App\LifeEvent' => 'App\Policies\LifeEventPolicy',
        'App\ImportantDay' => 'App\Policies\ImportantDayPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
