<?php

declare(strict_types=1);

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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
