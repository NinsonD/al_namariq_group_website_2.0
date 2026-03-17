<?php

namespace Modules\Frontend\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Frontend\Http\Requests\SliderRequest;
use Modules\Frontend\Models\Slider;
use Modules\Language\Enums\TranslatableModels;
use Modules\Language\Traits\TranslationGenerateTrait;

class SliderController extends Controller
{
    use TranslationGenerateTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::with('translations')->latest()->paginate(15);
        return view('frontend::slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend::slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $data = $request->validated();
        $data['status'] = $request->has('status') ? 1 : 0;


        if($request->hasFile('image')){
            $data['image'] = storeMedia($request->file('image'), 'slider') ?? null;
        }


        if($request->hasFile('nav_image')){
            $data['nav_image'] = storeMedia($request->file('nav_image'), 'slider') ?? null;
        }

        $slider = Slider::create($data);

        $this->generateTranslations(
            TranslatableModels::SLIDER,
            $slider,
            'slider_id',
            $request
        );

        return redirect()->route('admin.slider.index')->with('success', __('notification.created', ['field' => __('admin.slider')]));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider = Slider::with('translations')->findOrFail($id);
        return view('frontend::slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $data = $request->validated();
        $data['status'] = $request->has('status') ? 1 : 0;

        if($request->hasFile('image')){
            $data['image'] = storeMedia($request->file('image'), 'slider') ?? null;
        }

        if($request->hasFile('nav_image')){
            $data['nav_image'] = storeMedia($request->file('nav_image'), 'slider') ?? null;
        }

        $slider->update($data);

        $this->updateTranslations(
            $slider,
            $request,
            $data
        );

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.slider')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        if($slider->image){
            deleteMedia($slider->image);
        }

        if($slider->nav_image){
            deleteMedia($slider->nav_image);
        }

        $slider->translations()->delete();

        $slider->delete();

        return redirect()->back()->with('success', __('notification.deleted', ['field' => __('admin.slider')]));
    }
}
