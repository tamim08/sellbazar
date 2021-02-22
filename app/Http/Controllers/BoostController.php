<?php

namespace App\Http\Controllers;

use App\Model\Boost;
use Illuminate\Http\Request;
use App\Http\Requests\BoostRequest;
use App\Http\Resources\Boost\BoostResource;

class BoostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  BoostResource::collection(Boost::all());
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
    public function store(BoostRequest $request)
    {
        $var = Boost::create([
            $request->all()
        ]);
        return response([
            'data' => new BoostResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boost  $var
     * @return \Illuminate\Http\Response
     */
    public function show(Boost $var)
    {
        return new BoostResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boost  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(Boost $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boost  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boost $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new BoostResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boost  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boost $var)
    {
        $var->delete();
    }
}
