<?php

declare(strict_types=1);

namespace Modules\Appointment\Listeners;

use Illuminate\Support\Facades\Mail;
use Modules\Appointment\Events\AppointmentCreatedEvent;
use Modules\Appointment\Mail\AppointmentEmail;

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
