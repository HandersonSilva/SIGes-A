<?php

namespace App\Listeners;
use App\Events\SomeEventError;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventListenerError
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(SomeEventError $event)
    {
        //minha logica
        return redirect()->route('home.contato.email_error');
        //return view('layouts.home.confirmacao_email');
    }
}
