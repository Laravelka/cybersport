<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MatchStoreRequest;
use App\Http\Requests\MatchUpdateRequest;
use App\Http\Resources\MatchResource;
use App\Models\Game;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MatchResource::collection(Game::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatchStoreRequest $request)
    {
        $request_data = array_diff($request->validated(), [null]);

        $match = Game::create($request_data);

        return new MatchResource($match);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new MatchResource(Game::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MatchUpdateRequest $request, $id)
    {
        $match = Game::findOrFail($id);

        $request_data = array_diff($request->validated(), [null]);

        $match->update($request_data);

        return new MatchResource($match);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = Game::findOrFail($id);

        $match->delete();

        return response(null, 204);
    }
}
