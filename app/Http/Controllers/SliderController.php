<?php

namespace App\Http\Controllers;

use App\Model\Slider;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use App\Http\Resources\Slider\SliderResource;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  SliderResource::collection(Slider::all());
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
    public function store(SliderRequest $request)
    {
        $var = Slider::create([
            $request->all()
        ]);
        return response([
            'data' => new SliderResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $var
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $var)
    {
        return new SliderResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new SliderResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $var)
    {
        $var->delete();
    }
}
