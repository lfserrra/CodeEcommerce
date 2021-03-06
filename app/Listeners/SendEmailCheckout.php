<?php

namespace CodeCommerce\Listeners;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailCheckout {

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
     * @param  CheckoutEvent $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        $user  = $event->getUser();
        $order = $event->getOrder();

        Mail::send('emails.order', compact('user', 'order'), function ($message) use ($user, $order)
        {
            $message->to($user->email, $user->name)->subject('Pedido ' . $order->id . ' realizado com sucesso!');
        });
    }
}
