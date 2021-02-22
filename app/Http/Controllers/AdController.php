<?php

namespace App\Http\Controllers;

use App\Model\Ad;
use Illuminate\Http\Request;
use App\Http\Requests\AdRequest;
use App\Http\Resources\Ad\AdResource;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  AdResource::collection(Ad::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdRequest $request)
    {
        $var = Ad::create([
            $request->all()
        ]);
        return response([
            'data' => new AdResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ad  $var
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $var)
    {
        return new AdResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ad  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ad  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new AdResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ad  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $var)
    {
        $var->delete();
    }
}
