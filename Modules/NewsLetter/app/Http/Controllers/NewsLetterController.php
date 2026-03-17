<?php

namespace Modules\NewsLetter\Http\Controllers;

use App\Traits\GlobalInfoTrait;
use App\Traits\MailTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Modules\NewsLetter\Http\Requests\UserNewsLetterStoreRequest;
use Modules\NewsLetter\Models\NewsLetter;

class NewsLetterController extends Controller
{
    use MailTrait, GlobalInfoTrait;
    public function newsletter_request(UserNewsLetterStoreRequest $request)
    {

        try {
            DB::beginTransaction();

            $newsletter = new NewsLetter();
            $newsletter->email = $request->email;
            $newsletter->verify_token = Str::random(100);
            $newsletter->save();

            [$mail_subject, $mail_message] = $this->buildEmail('subscribe_notification');
            $link = ['CONFIRM YOUR EMAIL' => route('newsletter-verification', $newsletter->verify_token)];
            $this->set_mail_config();
            $this->send($newsletter->email, $mail_subject, $mail_message, $link);
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => __('notification.newsletter_verification_mail_sent'),
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            info($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => __('notification.mail_sent_failed'),
            ], 500);
        }
    }

    public function newsletter_verification($token)
    {
        $newsletter = NewsLetter::where('verify_token', $token)->first();

        if ($newsletter) {
            $newsletter->verify_token = null;
            $newsletter->is_verified = true;
            $newsletter->save();

            return redirect()->route('home')->with('success', __('notification.newsletter_verification_success'));

        } else {
            return redirect()->route('home')->with('error', __('notification.newsletter_verification_failed'));
        }

    }
}
