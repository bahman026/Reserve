<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\AppointmentCreatedEvent;
use App\Mail\AppointmentEmail;
use Illuminate\Support\Facades\Mail;

class SendAppointmentEmailListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AppointmentCreatedEvent $event): void
    {
        $appointment = $event->appointment;

        Mail::to($appointment->client->email)->send(new AppointmentEmail($appointment, 'client'));

        Mail::to($appointment->consultant->email)->send(new AppointmentEmail($appointment, 'consultant'));
    }
}
