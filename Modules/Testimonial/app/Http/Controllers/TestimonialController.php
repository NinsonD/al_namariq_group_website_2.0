<?php

namespace Modules\Testimonial\Http\Controllers;


use App\Http\Controllers\Controller;
use Modules\Language\Enums\TranslatableModels;
use Modules\Language\Traits\TranslationGenerateTrait;
use Modules\Testimonial\Models\Testimonial;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\Testimonial\Http\Requests\TestimonialRequest;

class TestimonialController extends Controller implements HasMiddleware
{
    use TranslationGenerateTrait;

    public static function middleware(){
        return [
            new Middleware('permission:testimonial-show', ['index']),
            new Middleware('permission:testimonial-create', ['create', 'store']),
            new Middleware('permission:testimonial-edit', ['update','edit']),
            new Middleware('permission:testimonial-delete', ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::orderByDesc("id")->paginate(15);
        return view('testimonial::index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testimonial::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialRequest $request)
    {

        $image = null;
        if ($request->hasFile('image')) {
            $image = storeMedia($request->file('image'), 'testimonials');
        }

        $testimonial = Testimonial::create([
            'image' => $image,
            'rating' => $request->score,
            'status' => $request->has('status') ? 1 : 0,
        ]);

         $this->generateTranslations(
            TranslatableModels::TESTIMONIAL,
            $testimonial,
            'testimonial_id',
            $request
        );

        return redirect()->route('admin.testimonial.index')->with('success', __('notification.created', ['field' => __('admin.testimonial')]));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('testimonial::edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialRequest $request, $id)
    {

        $testimonial = Testimonial::findOrFail($id);

        $image = $testimonial->image;
        if ($request->hasFile('image')) {
            $image = updateMedia($request->file('image'), $testimonial->image, 'testimonials' );
        }

        $testimonial->update([
            'image' => $image,
            'rating' => $request->score,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $this->updateTranslations(
            $testimonial,
            $request,
            $request->validated()
        );

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.testimonial')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if($testimonial->image) {
            deleteMedia($testimonial->image);
        }

        // delete translations
        $testimonial->translations()->delete();

        $testimonial->delete();

        return redirect()->back()->with('success', __('notification.deleted', ['field' => __('admin.testimonial')]));
    }
}
