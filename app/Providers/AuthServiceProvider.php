<?php

namespace App\Providers;

use App\Models\PostModel;
use App\Models\UserHistoryModel;
use App\Policies\PostModelPolicy;
use App\Policies\UserHistoryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        // PostModel::class=>PostModelPolicy::class
        UserHistoryModel::class => UserHistoryPolicy::class,
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
