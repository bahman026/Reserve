<?php

declare(strict_types=1);

namespace Modules\Appointment\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Appointment\Models\Appointment;

class AppointmentEmail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Appointment $appointment, public string $recipientType)
    {
        //
    }

    /**
     * Build the message.
     */
    public function build(): AppointmentEmail
    {
        $subject = $this->recipientType === 'client'
            ? 'Your Appointment Confirmation'
            : 'New Appointment Scheduled';

        return $this->subject($subject)
            ->view('emails.appointment');
    }
}
