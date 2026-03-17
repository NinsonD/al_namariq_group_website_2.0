<?php

namespace Modules\NewsLetter\Http\Controllers\Admin;

use App\Traits\MailTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\NewsLetter\Models\NewsLetter;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\NewsLetter\Http\Requests\NewsLetterBulkMailRequest;

class NewsLetterController extends Controller implements HasMiddleware
{
    use MailTrait;

    public static function middleware(){
        return [
            new Middleware('permission:newsletter-show', ['index']),
            new Middleware('permission:newsletter-delete', ['destroy']),

            new Middleware('permission:newsletter-delete_unverified_delete', ['delete_unverified']),
            new Middleware('permission:newsletter-send_bulk_mail_show', ['send_bulk_mail']),
            new Middleware('permission:newsletter-send_bulk_mail_send', ['send_mail_to_subscribers']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribers = NewsLetter::latest()->paginate(15);
        return view('newsletter::index', compact('subscribers'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) 
    {
        $newsletter = NewsLetter::findOrFail($id);
        $newsletter->delete();
        return redirect()->route('admin.newsletter.index')->with('success', __('notification.deleted', ['field' => __('admin.newsletter')]));
    }

    public function delete_unverified()
    {
        $unverified = NewsLetter::unverified()->get();
        foreach ($unverified as $subscriber) {
            $subscriber->delete();
        }
        return redirect()->back()->with('success', __('notification.deleted', ['field' => __('admin.unverified_subscribers')]));
    }

    public function send_bulk_mail()
    {
        return view('newsletter::send_bulk_mail');
    }

    public function send_mail_to_subscribers(NewsLetterBulkMailRequest $request)
    {

        $newsletterCount = NewsLetter::verified()->count();

        if ($newsletterCount > 0) {
           $email_list = NewsLetter::verified()->select('email')->latest()->get();

           $this->SendBulkEmail($email_list, $request->subject, $request->message);
           
           return redirect()->back()->with('success', __('notification.email_sent_all_subscribers'));

        }

        return redirect()->back()->with('error', __('notification.no_verified_subscribers_found'));
    }
}
