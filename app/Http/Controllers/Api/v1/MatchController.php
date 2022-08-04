<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MatchStoreRequest;
use App\Http\Requests\MatchUpdateRequest;
use App\Http\Resources\MatchResource;
use Illuminate\Http\Request;
use App\Models\Game;


class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return MatchResource::collection(Game::all());
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
}
