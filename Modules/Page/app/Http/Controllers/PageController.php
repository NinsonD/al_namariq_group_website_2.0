<?php

namespace Modules\Page\Http\Controllers;

use Modules\Language\Enums\TranslatableModels;
use Modules\Language\Traits\TranslationGenerateTrait;
use Str;
use Modules\Page\Models\Page;
use App\Http\Controllers\Controller;
use Modules\Page\Http\Requests\PageRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PageController extends Controller implements HasMiddleware
{
    use TranslationGenerateTrait;

     public static function middleware(){
        return [
            new Middleware('permission:page-show', ['index']),
            new Middleware('permission:page-create', ['create', 'store']),
            new Middleware('permission:page-edit', ['update','edit']),
            new Middleware('permission:page-delete', ['destroy']),
            new Middleware('permission:page-status', ['updateStatus']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::orderByDesc("id")->paginate(15);
        return view('page::index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        $page = Page::create([
            'slug' => Str::slug($request->slug),
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $this->generateTranslations(
            TranslatableModels::PAGE,
            $page,
            'page_id',
            $request
        );

        return redirect()->route('admin.page.index')->with('success', __('notification.created', ['field' => __('admin.page')]));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('page::edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, $id)
    {

        $page = Page::findOrFail($id);

        if($page->slug == 'privacy-policy' || $page->slug == 'terms-of-service' || $page->slug == 'terms-and-conditions') {
             $page->update([
                'status' => $request->has('status') ? 1 : 0,
            ]);
        }else{
            $page->update([
                'slug' => Str::slug($request->slug),
                'status' => $request->has('status') ? 1 : 0,
            ]);
        }

        $this->updateTranslations(
            $page,
            $request,
            $request->validated()
        );

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.page')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);

        if($page->slug == 'privacy-policy' || $page->slug == 'terms-of-service' || $page->slug == 'terms-and-conditions') {
            return redirect()->back()->with('error', __('notification.cant_delete_default_page'));
        }

        // delete translations
        $page->translations()->delete();

        $page->delete();

        return redirect()->back()->with('success', __('notification.deleted', ['field' => __('admin.page')]));
    }

    public function updatePageStatus($id)
    {
        $page = Page::findOrFail($id);
        $page->status = !$page->status;
        $page->save();

        $notification = __('notification.status_updated', ['field' => __('admin.page_status')]);

        return response()->json([
            'success' => true,
            'message' => $notification,
        ]);
    }
}
