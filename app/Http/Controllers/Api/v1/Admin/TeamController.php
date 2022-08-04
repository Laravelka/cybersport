<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamStoreRequest;
use App\Http\Requests\TeamUpdateRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TeamResource::collection(Team::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamStoreRequest $request)
    {
        $request_data = array_diff($request->validated(), [null]);

        if ($request->hasFile('logo')) {
            $request_data['logo'] = $request->logo->store('logos', 'public');
        }

        $team = Team::create($request_data);

        return new TeamResource($team);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new TeamResource(Team::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamUpdateRequest $request, $id)
    {
        $team = Team::findOrFail($id);

        $request_data = array_diff($request->validated(), [null]);

        if ($request->hasFile('logo')) {
            $request_data['logo'] = $request->logo->store('logos', 'public');

            $old_logo_path = $team->logo;
        }

        $team->update($request_data);

        if (isset($old_logo_path)) {
            Storage::disk('public')->delete($old_logo_path);
        }

        return new TeamResource($team);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        $logo_path = $team->logo;

        Team::destroy($id);

        if (isset($logo_path)) {
            Storage::disk('public')->delete($logo_path);
        }

        return response(null, 204);
    }
}
