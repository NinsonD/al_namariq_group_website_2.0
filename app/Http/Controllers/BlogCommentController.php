<?php

namespace App\Http\Controllers;


use App\Http\Requests\BlogCommentRequest;
use App\Traits\GlobalInfoTrait;
use App\Traits\MailTrait;
use Modules\Blog\Models\Blog;
use Modules\Blog\Models\BlogComment;
use Modules\Settings\Models\Setting;

class BlogCommentController extends Controller
{

    use MailTrait, GlobalInfoTrait;
    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCommentRequest $request)
    {

        if(auth()->user()->status == 'suspended'){
            return redirect()->back()->with('error', __('frontend.your_account_is_suspended_cant_comment'));
        }elseif(auth()->user()->status == 'inactive'){
            return redirect()->back()->with('error', __('frontend.your_account_is_inactive_cant_comment'));
        }

        $status = cache('setting')->comments_auto_approved  ?? Setting::where('key', 'comments_auto_approved')->first()?->value;

        $blog = Blog::findOrFail($request->blog_id);

        $blog->comments()->create([
            'user_id'   => auth()->id(),
            'comment'   => $request->comment,
            'parent_id' => $request->parent_id ?? null,
            'status'    => auth()->user()->type == 'admin' ? 1 : ($status ? 1 : 0),
        ]);

        if($status){
            return redirect()->back()->with('success', __('frontend.comment_added_successfully'));
        }else{
            try {
                $str_replace = [
                    'admin_name' => $blog->author->name,
                    'user_name' => auth()->user()->name,
                    'blog_title' => $blog->title,
                    'link' => route('blog.details', ['slug' => $blog->slug]),
                ];

                $this->set_mail_config();
                [$mail_subject, $mail_message] = $this->buildEmail('blog_comment', $str_replace);

                $this->send($blog->author->email, $mail_subject, $mail_message);

            } catch (\Exception $e) {
                info($e->getMessage());
            }
        }

        return redirect()->back()->with('success', __('frontend.comment_submitted_successfully'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogCommentRequest $request, $blogComment)
    {

        $userID = auth()->id();

        $comment = BlogComment::where('id', $blogComment)->where('blog_id', $request->blog_id)->where('user_id', $userID)->first();
        if(!$comment){
            return redirect()->back()->with('error', __('frontend.you_are_not_authorized_to_update_this_comment'));
        }

        if(auth()->user()->status == 'suspended'){
            return redirect()->back()->with('error', __('frontend.your_account_is_suspended_cant_update_comment'));
        }elseif(auth()->user()->status == 'inactive'){
            return redirect()->back()->with('error', __('frontend.your_account_is_inactive_cant_update_comment'));
        }

        $status = cache('setting')->comments_auto_approved  ?? Setting::where('key', 'comments_auto_approved')->first()?->value;

        $comment->update([
            'comment' => $request->comment,
            'status'  => $status ? 1 : 0,
        ]);
        if($status){
            return redirect()->back()->with('success', __('frontend.comment_added_successfully'));
        }

        return redirect()->back()->with('success', __('frontend.comment_submitted_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogComment $blogComment)
    {
        if(auth()->user()->status == 'suspended'){
            return redirect()->back()->with('error', __('frontend.your_account_is_suspended_cant_del_comment'));
        }elseif(auth()->user()->status == 'inactive'){
            return redirect()->back()->with('error', __('frontend.your_account_is_inactive_cant_del_comment'));
        }

        $blogComment->delete();
        return redirect()->back()->with('success', __('frontend.comment_deleted_successfully'));
    }
}
