<?php

namespace Modules\Faqs\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\Faqs\Models\Faq;
use App\Http\Controllers\Controller;
use Modules\Faqs\Http\Requests\FaqRequest;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Language\Enums\TranslatableModels;
use Modules\Language\Traits\TranslationGenerateTrait;

class FaqsController extends Controller implements HasMiddleware
{
    use TranslationGenerateTrait;

    public static function middleware(): array
    {
        return [
            new Middleware('permission:faqs-show', ['index']),
            new Middleware('permission:faqs-create', ['create', 'store']),
            new Middleware('permission:faqs-edit', ['edit', 'update']),
            new Middleware('permission:faqs-delete', ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::orderByDesc("id")->paginate(15);
        return view('faqs::index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faqs::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {

        $data = $request->validated();
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['show_on_homepage'] = $request->has('show_on_homepage') ? 1 : 0;

        $faq = Faq::create($data);

        $this->generateTranslations(
            TranslatableModels::FAQ,
            $faq,
            'faq_id',
            $request
        );

        return redirect()->route('admin.faqs.index')->with('success', __('notification.created', ['field' => __('admin.faq')]));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('faqs::edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqRequest $request, $id)
    {

        $data = $request->validated();
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['show_on_homepage'] = $request->has('show_on_homepage') ? 1 : 0;

        $faq = Faq::findOrFail($id);
        $faq->update($data);

          $this->updateTranslations(
            $faq,
            $request,
            $data
        );

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.faq')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);

        // delete translations
        $faq->translations()->delete();
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', __('notification.deleted', ['field' => __('admin.faq')]));
    }
}
