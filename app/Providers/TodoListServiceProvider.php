<?php

namespace App\Providers;

use App\Services\TodoListService;
use Illuminate\Support\ServiceProvider;
use App\Services\Impl\TodoListServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;

class TodoListServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        TodoListService::class => TodoListServiceImpl::class
    ];

    public function provides() : array {
        return [TodoListService::class];
    }

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
        //
    }
}
