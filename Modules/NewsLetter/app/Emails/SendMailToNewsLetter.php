<?php

namespace Modules\NewsLetter\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailToNewsLetter extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct() {}

    /**
     * Build the message.
     */
    public function build(): self
    {
        return $this->view('view.name');
    }
}
