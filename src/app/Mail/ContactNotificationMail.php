<?php

namespace App\Mail;

use App\Models\Contacts;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Contacts $contact
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Novo contacto recebido'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-notification'
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
