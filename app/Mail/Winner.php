<?php

namespace App\Mail;

use Duplex\Enums\Game;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Winner extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        private string $token,
        private int $type,
        private int $prize
    )
    { }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: trans('mail.subject.winner'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: $this->prize === 1 ? 'emails.winner_switch' : 'emails.winner_cards',
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
        return [
            Attachment::fromPath(storage_path('app/carta.pdf'))
                ->as('carta_aceptacion.pdf')
                ->withMime('application/pdf')
        ];
    }
}
