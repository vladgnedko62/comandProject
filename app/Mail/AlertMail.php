<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\Alerts;
use App\Models\Images;

class AlertMail extends Mailable
{
    use Queueable, SerializesModels;

     private Alerts $alert;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Alerts $alert)
    {
        $this->alert = $alert;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {

     
        return new Envelope(
        
            to:new Address ($this->alert->user->email,$this->alert->user->email),
        subject:$this->alert->alert,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $images = Images::all()->where('alert_id',$this->alert->id);
   

        return new Content(
            view: 'alerts.emailView',
            with: [
                'alertName' => $this->alert->alert,
                'images' => $images,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
