<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        \App\Models\Visitor::observe(\App\Observers\VisitorObserver::class);
        \App\Models\User::observe(\App\Observers\UserObserver::class);
        \App\Models\Color::observe(\App\Observers\ColorObserver::class);
        \App\Models\Font::observe(\App\Observers\FontObserver::class);
        \App\Models\Icon::observe(\App\Observers\IconObserver::class);
        \App\Models\Layout::observe(\App\Observers\LayoutObserver::class);
        \App\Models\ProjectType::observe(\App\Observers\ProjectTypeObserver::class);
        \App\Models\Product::observe(\App\Observers\ProductObserever::class);
    }
}
