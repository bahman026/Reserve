<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Events\AppointmentCreatedEvent;
use App\Models\Appointment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

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
