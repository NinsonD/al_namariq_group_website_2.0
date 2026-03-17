<?php

namespace Modules\Service\Http\Controllers;

use Modules\Language\Enums\TranslatableModels;
use Modules\Language\Traits\TranslationGenerateTrait;
use Str;
use Modules\Service\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\Service\Http\Requests\ServiceRequest;

class ServiceController extends Controller implements HasMiddleware
{
    use TranslationGenerateTrait;

    public static function middleware(){
        return [
            new Middleware('permission:services-show', ['index']),
            new Middleware('permission:services-create', ['create', 'store']),
            new Middleware('permission:services-edit', ['update','edit']),
            new Middleware('permission:services-delete', ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderByDesc("id")->paginate(15);
        return view('service::index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('service::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $img = null;
        if($request->hasFile('image')) {
            $img = storeMedia($request->file('image'), 'services');
        }

        $icon = null;
        if($request->hasFile('icon')) {
            $icon = storeMedia($request->file('icon'), 'services');
        }

        $service = Service::create([
            'slug' => Str::slug($request->slug),
            'image' => $img,
            'icon'=> $icon,
            'tags' => is_string($request->tags) ? json_decode($request->tags, true) : $request->tags,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $this->generateTranslations(
            TranslatableModels::SERVICE,
            $service,
            'service_id',
            $request
        );


        return redirect()->route('admin.service.index')->with('success', __('notification.created', ['field' => __('admin.service')]));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('service::edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, $id)
    {

        $service = Service::findOrFail($id);

        $img = $service->image;
        if($request->hasFile('image')) {
            $img = updateMedia($request->file('image'), $service->image, 'services');
        }

        $icon = $service->icon;
        if($request->hasFile('icon')) {
            $icon = updateMedia($request->file('icon'), $service->icon, 'services');
        }


        $service->update([
            'slug' => Str::slug($request->slug),
            'image' => $img,
            'icon'=> $icon,
            'tags' => is_string($request->tags) ? json_decode($request->tags, true) : $request->tags,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $this->updateTranslations(
            $service,
            $request,
            $request->validated()
        );

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.service')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        if($service->image) {
            deleteMedia($service->image);
        }
        if($service->icon) {
            deleteMedia($service->icon);
        }

        // delete translations
        $service->translations()->delete();

        $service->delete();

        return redirect()->route('admin.service.index')->with('success', __('notification.deleted', ['field' => __('admin.service')]));
    }
}
