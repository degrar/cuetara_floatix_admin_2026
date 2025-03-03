<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MoreInfo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        private string $token,
        private int $type
    )
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: trans('mail.subject.moreinfo_' . $this->type),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: $this->type === 3 ? 'emails.moreinfo_dni' : 'emails.moreinfo_letter',
            with: [
                'token' => $this->token,
                'formLink' => route('more-info', ['token' => $this->token, 'type' => $this->type])
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        if ($this->type === 3) {
            return [];
        }

        return [
            \Illuminate\Mail\Attachment::fromPath(storage_path('app/carta.pdf'))
                ->as('carta_aceptacion.pdf')
                ->withMime('application/pdf')
        ];
    }

}
