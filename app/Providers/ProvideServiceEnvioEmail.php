<?php

namespace App\Providers;

use App\Events\SomeEventError;
use App\Listeners\EventListenerError;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\EventEmail;
use App\Listeners\ListenerEnvioEmail;

class ProvideServiceEnvioEmail extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\EventEmail' => [
            'App\Listeners\ListenerEnvioEmail',
        ],
        //evento
        EventEmail::class=>[
            //listener
            ListenerEnvioEmail::class,

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
