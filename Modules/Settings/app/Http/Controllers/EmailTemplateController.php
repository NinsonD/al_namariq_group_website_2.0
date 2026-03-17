<?php

namespace Modules\Settings\Http\Controllers;

use App\Traits\RedirectTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Modules\Settings\Models\EmailTemplate;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Settings\Http\Requests\MailRequest;
use Modules\Settings\Traits\SettingsCacheTrait;
use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\Settings\Http\Requests\MailTemplateRequest;

class EmailTemplateController extends Controller implements HasMiddleware
{
    use RedirectTrait, SettingsCacheTrait;

    public static function middleware(){
        return [
            new Middleware('permission:mail-show', ['mail_settings']),
            new Middleware('permission:mail-update', ['update_mail_settings']),
            new Middleware('permission:mail-template_show', ['get_mail_template']),
            new Middleware('permission:mail-template_update', ['update_mail_template']),
        ];
    }

    public function mail_settings()
    {
        $templates = EmailTemplate::all();
        return view('settings::mail', compact('templates'));
    }

    public function update_mail_queue_status(Request $request)
    {

        updateSettings('is_mail_queable', $request->has('is_mail_queable') ? 1 : 0);

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.mail_queue_status')]));
    }

    public function update_mail_settings(MailRequest $request)
    {
        $data = $request->validated();

        foreach ($data as $key => $value) {
            updateSettings($key, $value);
        }

        $data = [
            'MAIL_MAILER' => 'smtp',
            'MAIL_HOST' => $request->mail_host,
            'MAIL_PORT' => $request->mail_port,
            'MAIL_USERNAME' => $request->mail_username,
            'MAIL_PASSWORD' => $request->mail_password,
            'MAIL_ENCRYPTION' => $request->mail_encryption,
            'MAIL_FROM_ADDRESS' => $request->mail_sender_email,
            'MAIL_FROM_NAME' => $request->mail_sender_name,
        ];

        updateMultiEnv($data);

        Artisan::call('config:clear');

        cache()->forget('setting');

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.mail_settings')]));
    }

    public function get_mail_template($id)
    {
        $template = EmailTemplate::findOrFail($id);


        if($template->name == 'password_reset'){
            return view('settings::mail.templates.password_reset', compact('template'));
        }
        elseif($template->name == 'contact_mail'){
            return view('settings::mail.templates.contact_mail', compact('template'));
        }
        elseif($template->name == 'subscribe_notification'){
            return view('settings::mail.templates.subscribe_notification', compact('template'));
        }
        elseif($template->name == 'user_verification'){
            return view('settings::mail.templates.user_verification', compact('template'));
        }
        elseif($template->name == 'blog_comment'){
            return view('settings::mail.templates.blog_comment', compact('template'));
        }
        elseif($template->name == 'order_confirmation_mail'){
            return view('settings::mail.templates.order_confirmation_mail', compact('template'));
        }
        elseif($template->name == 'order_status'){
            return view('settings::mail.templates.order_status', compact('template'));
        }
        elseif($template->name == 'payment_status'){
            return view('settings::mail.templates.payment_status', compact('template'));
        }
        else{
            return redirect()->back()->with('error', __('notification.something_went_wrong'));
        }
    }

    public function update_mail_template(MailTemplateRequest $request, $id)
    {
        $template = EmailTemplate::findOrFail($id);
        $template->subject = $request->subject;
        $template->message = $request->message;
        $template->save();

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.mail_template')]));
    }
}
