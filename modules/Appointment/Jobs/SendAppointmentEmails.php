<?php

declare(strict_types=1);

namespace Modules\Appointment\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Modules\Appointment\Events\AppointmentCreatedEvent;
use Modules\Appointment\Models\Appointment;

class SendAppointmentEmails implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Appointment $appointment)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        event(new AppointmentCreatedEvent($this->appointment));
    }
}
