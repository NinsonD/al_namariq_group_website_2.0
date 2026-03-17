<?php

namespace Modules\NewsLetter\Jobs;

use Illuminate\Bus\Queueable;
use App\Traits\GlobalInfoTrait;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Modules\Settings\Models\EmailTemplate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\NewsLetter\Emails\NewsLetterVerifyMail;

class NewsLetterVerifyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, GlobalInfoTrait;

    /**
     * Create a new job instance.
     */
    public function __construct(private $newletter) {}

    /**
     * Execute the job.
     */
    public function handle(): void 
    {
        $this->set_mail_config();

        try {
            $template = EmailTemplate::where('name', 'subscribe_notification')->first();
            $message = $template->message;
            $subject = $template->subject;
            Mail::to($this->newsletter_info->email)->send(new NewsLetterVerifyMail($this->newsletter_info, $subject, $message));
        } catch (Exception $ex) {
            
        }
    }
}
