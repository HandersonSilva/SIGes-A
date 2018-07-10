<?php

namespace App\Providers;

use App\Events\SomeEventError;
use App\Listeners\EventListenerError;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\SomeEvent;
use App\Listeners\EventListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
        //evento
        SomeEvent::class=>[
            //listener
            EventListener::class,

        ],
        SomeEventError::class=>[
            EventListenerError::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    
    }
}
