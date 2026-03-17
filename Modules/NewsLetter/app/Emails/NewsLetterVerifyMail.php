<?php

namespace Modules\NewsLetter\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsLetterVerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public $newsletter, public $mail_subject, public $mail_template) {}

    /**
     * Build the message.
     */
    public function build(): self
    {
        return $this->subject($this->mail_subject)->view('newsletter::verify_mail_template', ['newsletter_info' => $this->newsletter,
        'mail_template' => $this->mail_template]);
    }
}
