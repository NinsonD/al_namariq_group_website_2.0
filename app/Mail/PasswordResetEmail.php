<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Modules\Settings\Models\EmailTemplate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Auth\CanResetPassword;

class PasswordResetEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $template;
    public $mail_message;
    /**
     * Create a new message instance.
     */
    public function __construct(public $url, public CanResetPassword $user)
    {
        $this->url = $url;
        $this->template = EmailTemplate::where('name', 'password_reset')->first();
        $this->mail_message = str_replace(
            ['{{user_name}}'],
            [$this->user->name],
            $this->template->message
        );
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->template->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.password_reset',
            with: [
                'mail_message' => $this->template->message,
                'link' => $this->url,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
