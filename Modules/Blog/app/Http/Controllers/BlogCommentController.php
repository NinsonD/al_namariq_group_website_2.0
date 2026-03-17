<?php

namespace Modules\Blog\Http\Controllers;

use App\Enums\RedirectType;
use App\Traits\RedirectTrait;
use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\Blog\Models\Blog;
use App\Http\Controllers\Controller;
use Modules\Blog\Models\BlogComment;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Blog\Http\Requests\BlogCommentRequest;

class BlogCommentController extends Controller implements HasMiddleware
{

    public static function middleware(){
        return [
            new Middleware('permission:blog_comment-show', ['index', 'show']),
            new Middleware('permission:blog_comment-delete', ['destroy']),
            new Middleware('permission:blog_comment-status', ['status']),
        ];
    }

    use RedirectTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = BlogComment::with(['user', 'blog', 'blog.translations'])->latest()->paginate(15);;
        return view("blog::comment.index", compact('comments'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCommentRequest $request)
    {

        $blog = Blog::findOrFail($request->blog_id);

        $blog->comments()->create([
            'user_id'   => auth()->id(),
            'comment'   => $request->comment,
            'parent_id' => $request->parent_id ?? null,
            'status'    => 1,
        ]);

        return redirect()->back()->with('success', __('notification.created', ['field' => __('admin.blog_comment')]));
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $comment = BlogComment::select('id', 'parent_id')->findOrFail($id);

        $rootId = $comment->parent_id ?? $comment->id;

        $comments = BlogComment::with(['user', 'blog', 'replies.user'])->where('id', $rootId)->get();

        return view('blog::comment.show', compact('comments'));
    }




    /**
     * Remove the specified resource from storage.
    */
    public function destroy($id)
    {
        $comment = BlogComment::findOrFail($id);
        $comment->delete();

        return redirect()->route('admin.blog-comment.index')->with('success', __('notification.deleted', ['field' => __('admin.blog_comment')]));
    }

    public function status($id)
    {
        $comment = BlogComment::findOrFail($id);
        $comment->status = !$comment->status;
        $comment->save();

        $notification = __('notification.status_updated', ['field' => __('admin.blog_comment')]);

        return response()->json([
            'success' => true,
            'message' => $notification,
        ]);
    }

}
