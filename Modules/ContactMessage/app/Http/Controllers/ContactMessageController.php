<?php

namespace Modules\ContactMessage\Http\Controllers;

use App\Enums\RedirectType;
use App\Traits\GlobalInfoTrait;
use App\Traits\MailTrait;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Settings\Traits\SettingsCacheTrait;
use Modules\ContactMessage\Models\ContactMessage;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Modules\ContactMessage\Http\Requests\ContactMessageRequest;
use Modules\ContactMessage\Http\Requests\ContactReceiverMailRequest;

class ContactMessageController extends Controller implements HasMiddleware
{
    use SettingsCacheTrait, MailTrait, GlobalInfoTrait;

    public static function middleware(): array
    {
        return [
            new Middleware('permission:contact_message-show', ['index', 'show']),
            new Middleware('permission:contact_message-receiver_mail_update', ['update_contact_receiver_mail']),
            new Middleware('permission:contact_message-delete', ['destroy']),
        ];
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(15);
        return view('contactmessage::index', compact('messages'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactMessageRequest $request) 
    {
        $settings = cache()->get('setting');

        $key = Str::lower('contact-message|' . $request->ip());
        $maxAttempts = 4;
        $decayMinutes = 1;

        try {
            $remaining = RateLimiter::remaining($key, $maxAttempts);

            if ($remaining < $maxAttempts && $remaining > 0) {
                $message = __('notification.too_many_attempts');
                return $request->ajax()
                    ? response()->json(['error' => $message], 429)
                    : back()->with('error', $message);
            }

            // Apply rate limit hit
            RateLimiter::hit($key, now()->addMinutes($decayMinutes));

            $contact_message = ContactMessage::create($request->validated());

            if (!$contact_message) {
                $message = __('notification.message_send_failed');
                return $request->ajax()
                    ? response()->json(['error' => $message], 500)
                    : back()->with('error', $message);
            }

            // Send Email
            try {
                $str_replace = [
                    'name' => $contact_message->name,
                    'email' => $contact_message->email,
                    'subject' => $contact_message->subject,
                    'message' => $contact_message->message,
                ];

                $this->set_mail_config();

                [$mail_subject, $mail_message] = $this->buildEmail('contact_mail', $str_replace);

                $receiver_mail = $settings->contact_message_receiver_mail ?? null;

                if ($receiver_mail) {
                    $this->send($receiver_mail, $mail_subject, $mail_message);
                } else {
                    $message = __('notification.contact_receiver_mail_not_found');
                    return $request->ajax()
                        ? response()->json(['error' => $message], 422)
                        : back()->with('error', $message);
                }
            } catch (\Exception $e) {
                info($e->getMessage());
            }

            $message = __('notification.message_sent');
            return $request->ajax()
                ? response()->json(['success' => true, 'message' => $message])
                : back()->with('success', $message);

        } catch (ThrottleRequestsException $e) {
            $message = __('notification.too_many_attempts');
            return $request->ajax()
                ? response()->json(['error' => $message], 429)
                : back()->with('error', $message);
        }
    }
    

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('contactmessage::show', compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) 
    {
        $contactMessage = ContactMessage::findOrFail($id);
        $contactMessage->delete();

        return redirect()->route('admin.contact-message.index')->with('success',  __('notification.deleted', ['field' => __('admin.contact_message')]));

    }


    public function update_contact_receiver_mail(ContactReceiverMailRequest $request)
    {
        updateSettings('contact_message_receiver_mail', $request->contact_message_receiver_mail);
        
        return redirect()->route('admin.contact-message.index')->with('success', __('notification.contact_receiver_mail_updated'));
    }
}
