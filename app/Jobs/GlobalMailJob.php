<?php

namespace App\Jobs;

use App\Mail\GlobalMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class GlobalMailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private $mail_address,
        private $mail_subject,
        private $mail_message,
        private $link = []
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try{
            Mail::to($this->mail_address)->send(new GlobalMail($this->mail_subject, $this->mail_message, $this->link));
        } catch (\Exception $e) {
            info('Mail sending failed: ' . $e->getMessage());
            throw $e;
        }
    }
}
