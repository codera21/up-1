<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\GoalRepository::class, \App\Repositories\GoalRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NewsRepository::class, \App\Repositories\NewsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LevelRepository::class, \App\Repositories\LevelRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FAQRepository::class, \App\Repositories\FAQRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MaterialGroupRepository::class, \App\Repositories\MaterialGroupRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MaterialSubGroupRepository::class, \App\Repositories\MaterialSubGroupRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MaterialRepository::class, \App\Repositories\MaterialRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CommentRepository::class, \App\Repositories\CommentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserGoalRepository::class, \App\Repositories\UserGoalRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StateRepository::class, \App\Repositories\StateRepositoryEloquent::class);        
        $this->app->bind(\App\Repositories\PaymentRepository::class, \App\Repositories\PaymentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PaymentDetailsRepository::class, \App\Repositories\PaymentDetailsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PaymentProfileRepository::class, \App\Repositories\PaymentProfileRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserCommissionRepository::class, \App\Repositories\UserCommissionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PageRepository::class, \App\Repositories\PageRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BankRepository::class, \App\Repositories\BankRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BannerRepository::class, \App\Repositories\BannerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MessageRepository::class, \App\Repositories\MessageRepositoryEloquent::class);
        //:end-bindings:
    }
}
