<?php

namespace App\Traits;

use App\Mail\GlobalMail;
use Cache;
use Exception;
use App\Models\User;
use App\Jobs\GlobalMailJob;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\Settings\Models\EmailTemplate;

trait MailTrait
{

    public static function isMailQueable()
    {
        return (bool) getSettingStatus('is_mail_queable');
    }

    public function send($mail_address, $mail_subject, $mail_message, $link = [])
    {
        
        try{
            if(self::isMailQueable()){
                dispatch(new GlobalMailJob($mail_address, $mail_subject, $mail_message, $link));
            }else{
                Mail::to($mail_address)->send(New GlobalMail($mail_subject, $mail_message, $link));
            }
        }
        catch(Exception $e){
            Log::error($e->getMessage());
            throw $e;
        }
    }

    public function SendBulkEmail($email_list, $mail_subject, $mail_message) {
        try {
            foreach ($email_list as $email) {
                $this->send($email->email, $mail_subject, $mail_message);

                Log::info('Email sent to: ' . $email->email);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }

    public function sendVerifyMailSingleUser($user) {
        try {
            [$subject, $message] = $this->buildEmail('user_verification',['user_name' => $user->name]);
            $link = [__('admin.confirm_your_email') => route('user-verification', $user->verification_token)];

            $this->send($user->email, $subject, $message, $link);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }

    public function sendVerifyMailToAllUser() {
        try {
            $users = User::where('email_verified_at', null)->orderBy('id', 'desc')->get();
            foreach ($users as $user) {
                $user->verification_token = \Illuminate\Support\Str::random(100);
                $user->save();

                [$subject, $message] = $this->buildEmail('user_verification',['user_name' => $user->name]);

                $link = [__('admin.confirm_your_email') => route('user-verification', $user->verification_token)];
                $message = str_replace('{{user_name}}', $user->name, $message);

                $this->send($user->email, $subject, $message, $link);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }

    public function buildEmail($name, $replace = [])
    {
        $template = EmailTemplate::where("name", $name)->first();
        if(!$template){
            return null;
        }

        $subject = $template->subject;
        $message = $template->message;

        if(!empty($replace)){
            foreach ($replace as $key => $value) {
                $message = str_replace(["{{" . $key . "}}", "{{ " . $key . " }}"], $value, $message);
            }
        }

        return [$subject, $message];
    }

    public function handleMailException(Exception $e) {
        info($e->getMessage());
        if ($e instanceof \Symfony\Component\Mailer\Exception\TransportExceptionInterface) {
            $message = __('admin.please_check_mail_config');
        } elseif ($e instanceof \ErrorException) {
            if (strpos($e->getMessage(), 'Trying to access array offset on value of type null') !== false) {
                $message = __('admin.please_check_mail_config');
            } else {
                $message = __('admin.an_unexpected_error_occurred');
            }
        } else {
            $message = __('admin.mail_operation_failed');
        }

        return redirect()->back()->with('error', $message);
    }
}
