<?php

namespace App\Mail;

use App\Models\Idea;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class IdeaStatusUpdatedMailable extends Mailable {
    use Queueable, SerializesModels;

    public $idea;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Idea $idea) {
        $this->idea = $idea;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope() {
        return new Envelope(
            subject: 'Idea Status Updated Mailable',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content() {
        return new Content(
            markdown: 'emails.idea-status-updated',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments() {
        return [];
    }
}
