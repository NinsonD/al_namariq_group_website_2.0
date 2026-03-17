<?php

namespace Modules\Portfolio\Http\Controllers;

use Modules\Language\Enums\TranslatableModels;
use Modules\Language\Traits\TranslationGenerateTrait;
use Str;
use App\Http\Controllers\Controller;
use Modules\Portfolio\Models\Portfolio;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\Portfolio\Http\Requests\PortfolioRequest;

class PortfolioController extends Controller implements HasMiddleware
{

    use TranslationGenerateTrait;

    public static function middleware(){
        return [
            new Middleware('permission:portfolio-show', ['index']),
            new Middleware('permission:portfolio-create', ['create', 'store']),
            new Middleware('permission:portfolio-edit', ['update','edit']),
            new Middleware('permission:portfolio-delete', ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::paginate(15);
        return view('portfolio::index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('portfolio::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortfolioRequest $request)
    {

        $image = null;
        if($request->hasFile('image')) {
            $image = storeMedia($request->file('image'), 'portfolios');
        }

        $portfolio = Portfolio::create([
            'slug' => Str::slug($request->slug),
            'client' => $request->client,
            'website' => $request->website,
            'website_url' => $request->website_url,
            'image' => $image,
            'year' => $request->year,
            'tags' => is_string($request->tags) ? json_decode($request->tags, true) : $request->tags,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $this->generateTranslations(
            TranslatableModels::PORTFOLIO,
            $portfolio,
            'portfolio_id',
            $request
        );


        return redirect()->route('admin.portfolio.index')->with('success', __('notification.created', ['field' => __('admin.portfolio')]));


    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolio::edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortfolioRequest $request, $id)
    {

        $portfolio = Portfolio::findOrFail($id);

        $image = $portfolio->image;
        if($request->hasFile('image')) {
            $image = updateMedia($request->file('image'), $portfolio->image, 'portfolios');
        }

        $portfolio->update([
            'slug' => Str::slug($request->slug),
            'client' => $request->client,
            'website' => $request->website,
            'website_url' => $request->website_url,
            'image' => $image,
            'year'=> $request->year,
            'tags' => is_string($request->tags) ? json_decode($request->tags, true) : $request->tags,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $this->updateTranslations(
            $portfolio,
            $request,
            $request->validated()
        );

        return redirect()->back()->with('success',  __('notification.updated', ['field' => __('admin.portfolio')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        if($portfolio->image) {
            deleteMedia($portfolio->image);
        }

        // delete translations
        $portfolio->translations()->delete();

        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('success', __('notification.deleted', ['field' => __('admin.portfolio')]));
    }
}
