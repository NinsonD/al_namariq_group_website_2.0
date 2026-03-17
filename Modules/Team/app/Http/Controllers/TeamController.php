<?php

namespace Modules\Team\Http\Controllers;

use Str;
use App\Enums\RedirectType;
use Illuminate\Http\Request;
use App\Traits\RedirectTrait;
use Modules\Team\Models\Team;
use App\Http\Controllers\Controller;
use Modules\Team\Http\Requests\TeamRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class TeamController extends Controller implements HasMiddleware
{
    use RedirectTrait;

    public static function middleware(){
        return [
            new Middleware('permission:team-show', ['index']),
            new Middleware('permission:team-create', ['create', 'store']),
            new Middleware('permission:team-edit', ['update','edit']),
            new Middleware('permission:team-delete', ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::orderByDesc("id")->paginate(15);
        return view('team::index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('team::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {

        $image = null;
        if ($request->hasFile('image')) {
            $image = storeMedia($request->file('image'), 'team');
        }

        $filteredSocialLinks = array_values(array_filter($request->social ?? [], function ($social) {
            return !empty($social['icon']) || !empty($social['url']);
        }));

        Team::create([
            'name' => $request->name,
            'username' => Str::slug($request->username),
            'designation' => $request->designation,
            'phone' => $request->phone,
            'email' => $request->email,
            'image' => $image,
            'qualification' => $request->qualification,
            'location' => $request->location,
            'age' => $request->age,
            'gender' => $request->gender,
            'status' => $request->has('status') ? 1 : 0,
            'bio' => $request->bio,
            'social_links' => $filteredSocialLinks,
        ]);

        return redirect()->route('admin.team.index')->with('success', __('notification.created', ['field' => __('admin.team_member')]));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('team::edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, $id)
    {

        $team = Team::findOrFail($id);

        $image = $team->image;
        if ($request->hasFile('image')) {
            $image = updateMedia($request->image, $team->image ,'team');
        }

        $filteredSocialLinks = array_values(array_filter($request->social ?? [], function ($social) {
            return !empty($social['icon']) && !empty($social['url']);
        }));

        $team->update([
            'name' => $request->name,
            'username'=> Str::slug($request->username),
            'designation' => $request->designation,
            'phone' => $request->phone,
            'email' => $request->email,
            'qualification' => $request->qualification,
            'location' => $request->location,
            'age' => $request->age,
            'image' => $image,
            'gender' => $request->gender,
            'status' => $request->has('status') ? 1 : 0,
            'bio' => $request->bio,
            'social_links' => $filteredSocialLinks,
        ]);

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.team_member')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        if($team->image) {
            deleteMedia($team->image);
        }

        $team->delete();

        return redirect()->route('admin.team.index')->with('success', __('notification.deleted', ['field' => __('admin.team_member')]));
    }
}
