<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DeletedUser extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(private readonly User $user)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->user->email,
            subject: 'Se ha eliminado tu usuario correctamente',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.farewell',
            with: [
                'name' => $this->user->name,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
